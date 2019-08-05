<?php

/**
 * 
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_VirtualUser extends TMS_DocumentedModelBinary
{

    /**
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_model = 'TMS_TestAttachment';
        $this->_a['table'] = 'tms_virtual_users';
        $this->_a['verbose'] = 'TMS Virtual Users';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'type' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 128,
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            /*
             * Relations
             */
            'test_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_Test',
                'name' => 'test',
                'relate_name' => 'attachments',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            )
        ));
    }
}