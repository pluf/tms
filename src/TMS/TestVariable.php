<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_TestVariable extends Pluf_Model
{

    /**
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        $this->_a['table'] = 'tms_test_variables';
        $this->_a['verbose'] = 'TMS Test Variable';
        $this->_a['cols'] = array(
            'id' => array(
                'type' => 'Pluf_DB_Field_Sequence',
                'is_null' => false,
                'editable' => false,
                'readable' => true
            ),
            'key' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 128,
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'value' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 1024,
                'is_null' => true,
                'default' => 'empty',
                'editable' => true,
                'readable' => true
            ),
            'description' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'blank' => true,
                'is_null' => true,
                'size' => 1024,
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
                'relate_name' => 'variables',
                'graphql_name' => 'test',
                'graphql_field' => true,
                'is_null' => true,
                'editable' => true,
                'readable' => true
            )
        );
    }

}