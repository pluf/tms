<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_TestRunTemplate extends TMS_DocumentedModelBinary
{

    /**
     *
     * @see Pluf_Model::init()
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