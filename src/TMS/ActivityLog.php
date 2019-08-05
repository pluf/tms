<?php

/**
 * 
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_ActivityLog extends TMS_DocumentedModel
{

    /**
     * مدل داده‌ای را بارگذاری می‌کند.
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_model = 'TMS_ActivityLog';
        $this->_a['table'] = 'tms_activity_logs';
        $this->_a['verbose'] = 'TMS Activity Log';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'duration' => array(
                'type' => 'Pluf_DB_Field_Float',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'creation_dtime' => array(
                'type' => 'Pluf_DB_Field_Datetime',
                'is_null' => false,
                'editable' => false,
                'readable' => true
            ),
            /*
             * Relations
             */
            'project_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_Project',
                'name' => 'project',
                'relate_name' => 'logs',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'test_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_Test',
                'name' => 'test',
                'relate_name' => 'logs',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'activity_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_Activity',
                'name' => 'activity',
                'relate_name' => 'logs',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'writer_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'User_Account',
                'name' => 'writer',
                'relate_name' => 'logs',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            )
        ));
    }
    
    /**
     * \brief پیش ذخیره را انجام می‌دهد
     *
     * @param $create حالت
     *            ساخت یا به روز رسانی را تعیین می‌کند
     */
    function preSave($create = false)
    {
        if ($this->id == '') {
            $this->creation_dtime = gmdate('Y-m-d H:i:s');
        }
    }

}