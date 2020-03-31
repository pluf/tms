<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_TestRun extends TMS_DocumentedModelBinary
{

    /**
     *
     * {@inheritdoc}
     * @see TMS_DocumentedModelBinary::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_test_runs';
        $this->_a['verbose'] = 'TMS Test Run';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'start_dtime' => array(
                'type' => 'Datetime',
                'is_null' => true,
                'blank' => true,
                'default' => '0000-00-00 00:00:00',
                'editable' => false,
                'readable' => true
            ),
            'end_dtime' => array(
                'type' => 'Datetime',
                'is_null' => true,
                'blank' => true,
                'default' => '0000-00-00 00:00:00',
                'editable' => false,
                'readable' => true
            ),
            'folder_path' => array(
                'type' => 'Varchar',
                'is_null' => true,
                'size' => 1024,
                'editable' => true,
                'readable' => true
            ),
            /*
             * Relations
             */
            'test_id' => array(
                'type' => 'Foreignkey',
                'model' => 'TMS_Test',
                'name' => 'test',
                'graphql_name' => 'test',
                'relate_name' => 'runs',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'pipeline_id' => array(
                'type' => 'Foreignkey',
                'model' => 'Pluf\Jms\Pipeline',
                'name' => 'pipeline',
                'graphql_name' => 'pipeline',
                'relate_name' => 'runs',
                'is_null' => false,
                'editable' => false,
                'readable' => true
            )
        ));
    }
}