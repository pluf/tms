<?php

/**
 * Test Run Template
 * 
 * Defines a template for test run results.
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_TestRunTemplate extends TMS_DocumentedModelBinary
{

    /**
     *
     * {@inheritdoc}
     * @see TMS_DocumentedModelBinary::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_report_templates';
        $this->_a['verbose'] = 'TMS Report Template';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            /*
             * Relations
             */
        ));
    }
}