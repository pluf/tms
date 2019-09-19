<?php

class TMS_PiplineBuilder
{

    public static function createPipline($testRun)
    {
        $test = $testRun->get_test();
        // TODO: create influx db

        // create new pipline
        $pipeline = new Pluf\Jms\Pipeline();
        $pipeline->title = $test->title;
        $pipeline->description = $test->description;
        $pipeline->create();

        // Set pipeline of test-run
        $testRun->pipeline = $pipeline;
        $testRun->update();

        // Add Job
        self::addGazmehJob($pipeline, $testRun, $test);

        // Run pipeline
        $pipeline->status = Pluf\Jms\PipelineState::STATUS_WAIT;
        $pipeline->update();
        $pipeline->run();

        return $pipeline;
    }

    private static function addGazmehJob($pipeline, $testRun, $test)
    {
        $job = new Pluf\Jms\Job();
        $job->image = 'gazmeh';
        $job->name = sprintf('g.%d.%d.%d', $test->project_id, $test->id, $testRun->id);
        $job->description = 'This is a job to run a load test';
        $job->status = Pluf\Jms\JobState::STATUS_INIT;

        // add to the pipeline
        $job->pipeline_id = $pipeline;
        $job->create();

        self::attachVariables($job, $test, $testRun);
        self::attachCommands($job, $test);
        self::attachResources($job, $test);
        self::attachLogger($job, $testRun);

        $job->status = Pluf\Jms\JobState::STATUS_WAIT;
        $job->update();
        return $job;
    }

    private static function attachVariables($job, $test, $testRun)
    {
        // test_name
        $attr = new Pluf\Jms\Attribute();
        $attr->name = 'test_name';
        $attr->value = $test->title;
        $attr->job_id = $job;
        $attr->create();
        // run_id
        $attr = new Pluf\Jms\Attribute();
        $attr->name = 'run_id';
        $attr->value = $testRun->id;
        $attr->job_id = $job;
        $attr->create();
        if (self::isGazmehDesign($test)) {
            // test_main_jmx
            $attr = new Pluf\Jms\Attribute();
            $attr->name = 'test_main_jmx';
            $attr->value = 'config.jmx';
            $attr->job_id = $job;
            $attr->create();
        }else{
            $variables = $test->get_variables_list();
            foreach ($variables as $var) {
                if($var->key === 'test.main.jmx'){
                    // test_main_jmx
                    $attr = new Pluf\Jms\Attribute();
                    $attr->name = 'test_main_jmx';
                    $attr->value = $var->value;
                    $attr->job_id = $job;
                    $attr->create();
                }
            }
        }
    }
    
    private static function attachCommands($job, $test){
        $builder = new TMS_ScriptBuilder();
        $command = '';
        // Create JMX file
        if(self::isGazmehDesign($test)){
            $command .= 'gazmeh-converter --output config.jmx ';
            // add template
            $command .= '--template templates/gazmeh.jmx ';
            // add virtual users file
            $vuList = $test->get_vitual_users_list();
            foreach ($vuList as $vu) {
                $command .= sprintf('--virtual-user vu_file_name_%d ', $vu->id);
            }
            // add variables
            $varList = $test->get_variables_list();
            foreach ($varList as $var) {
                $command .= sprintf('--variable "%s=%s" ', $var->key, $var->value);
            }
            $command .= '--variable "run.id=${run_id}" ';
            $command .= '--variable "test.name=${test_name}" ';
            
            $builder->addComment('Convert desinge into a JMX file');
            $builder->addCommand($command);
            $builder->addComment('Run jmeter');
            $builder->addCommand('jmeter -n -t ${test_main_jmx} -l jmeter.log ');
        }else{
            // create jmeter command
            $command .= 'jmeter -n -t ${test_main_jmx} -l jmeter.log ';
            // add variables
            $varList = $test->get_variables_list();
            foreach ($varList as $var) {
                $command .= sprintf('-J%s="%s" ', $var->key, $var->value);
            }
            $command.= '-J%s=${run_id} ';
            $builder->addComment('Run jmeter');
            $builder->addCommand($command);
        }
        $content = $builder->buildString();
        Pluf\Jms\JobUtils::setContent($job, $content);
    }
    
    private static function attachResources($job, $test){
        // Attachments
        $attachList = $test->get_attachments_list();
        foreach ($attachList as $attach){
            $jmsAttach = new Pluf\Jms\Attachment();
            $jmsAttach->extract = false;
            $jmsAttach->job_id = $job;
            $jmsAttach->create();
            Pluf_FileUtil::copyFile($attach->getAbsloutPath(), $jmsAttach->getAbsloutPath());
            $jmsAttach->file_name = $attach->file_name;
            $jmsAttach->mime_type = $attach->mime_type;
            $jmsAttach->file_size = $attach->file_size;
            $jmsAttach->update();
        }
        // Virtual Users
        $vuList = $test->get_virtual_users_list();
        foreach ($vuList as $vu){
            $jmsAttach = new Pluf\Jms\Attachment();
            $jmsAttach->extract = false;
            $jmsAttach->job_id = $job;
            $jmsAttach->create();
            Pluf_FileUtil::copyFile($vu->getAbsloutPath(), $jmsAttach->getAbsloutPath());
            $jmsAttach->file_name = $vu->file_name;
            $jmsAttach->mime_type = $vu->mime_type;
            $jmsAttach->file_size = $vu->file_size;
            $jmsAttach->update();
        }
    }
    
    private static function attachLogger($job, $testRun){
        $loggerUrl = 'http://influxdb:8086';
        $jobLogger = new Pluf\Jms\Logger();
        $jobLogger->url = $loggerUrl . '/write?precision=ms&db=test_run_' . $testRun->id;
        $jobLogger->period = 'PT5s';
        $jobLogger->template = 'logs,logger=\"{{logger}}\",level={{level}} message=\"{{message}}\" {{timestamp}}';
        $jobLogger->job_id = $job;
        $jobLogger->create();
    }
    
    /**
     * Checks if the `design` field of the $test is not empty and is started with 'gazmeh'.
     * @param TMS_Test $test
     * @return boolean
     */
    private static function isGazmehDesign($test){
        return $test->isDesigned() && self::startsWith($test->design, 'gazmeh');
    }
    
    /**
     * 
     * Checks if given $str starts with given $query
     * @param string $str
     * @param string $query
     * @return boolean
     */
    private static function startsWith($str, $query){
        return substr($str, 0, strlen($query)) === $query;
    }
}

