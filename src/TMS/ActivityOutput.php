<?php

/**
 * 
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_ActivityOutput extends TMS_DocumentedModel
{

    /**
     * مدل داده‌ای را بارگذاری می‌کند.
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_model = 'TMS_ActivityOutput';
        $this->_a['table'] = 'tms_activity_outputs';
        $this->_a['verbose'] = 'TMS Activity Output';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            /*
             * Relations
             */
            'activity_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_Activity',
                'name' => 'activity',
                'relate_name' => 'logs',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            )
        ));
    }
    
}