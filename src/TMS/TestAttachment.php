<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_TestAttachment extends TMS_DocumentedModelBinary
{

    /**
     *
     * {@inheritdoc}
     * @see TMS_DocumentedModelBinary::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_test_attachments';
        $this->_a['verbose'] = 'TMS Test Attachment';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            /*
             * Relations
             */
            'test_id' => array(
                'type' => 'Foreignkey',
                'model' => 'TMS_Test',
                'name' => 'test',
                'relate_name' => 'attachments',
                'graphql_name' => 'test',
                'graphql_field' => true,
                'is_null' => false,
                'editable' => true,
                'readable' => true
            )
        ));
    }
}