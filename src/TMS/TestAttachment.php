<?php

/**
 * 
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_TestRisk extends TMS_DocumentedModelBinary
{

    /**
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_model = 'TMS_TestAttachment';
        $this->_a['table'] = 'tms_test_attachments';
        $this->_a['verbose'] = 'TMS Test Attachment';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
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