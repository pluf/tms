<?php

/**
 * 
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_ActivityComment extends Pluf_Model
{

    /**
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        $this->_a['table'] = 'tms_activity_comments';
        $this->_a['verbose'] = 'TMS Activity Commment';
        $this->_a['cols'] = array(
            'id' => array(
                'type' => 'Pluf_DB_Field_Sequence',
                'blank' => false,
                'editable' => false,
                'readable' => true
            ),
            'mime_type' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 128,
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'text' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 2048,
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
            'activity_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_Activity',
                'name' => 'activity',
                'relate_name' => 'comments',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'writer_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'User_Account',
                'name' => 'writer',
                'relate_name' => 'comments',
                'is_null' => false,
                'editable' => false,
                'readable' => true
            )
        );
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