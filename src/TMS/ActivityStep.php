<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_ActivityStep extends TMS_DocumentedModel
{

    /**
     * مدل داده‌ای را بارگذاری می‌کند.
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_activity_steps';
        $this->_a['verbose'] = 'TMS Activity Step';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'order' => array(
                'type' => 'Pluf_DB_Field_Integer',
                'is_null' => false,
                'default' => 0,
                'editable' => true,
                'readable' => true
            ),
            'is_checked' => array(
                'type' => 'Pluf_DB_Field_Boolean',
                'is_null' => false,
                'default' => false,
                'editable' => true
            ),
            /*
             * Relations
             */
            'activity_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_Activity',
                'name' => 'activity',
                'relate_name' => 'steps',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            )
        ));
    }

}