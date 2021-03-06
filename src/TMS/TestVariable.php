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
     * {@inheritdoc}
     * @see Pluf_Model::init()
     */
    function init()
    {
        $this->_a['table'] = 'tms_test_variables';
        $this->_a['verbose'] = 'TMS Test Variable';
        $this->_a['cols'] = array(
            'id' => array(
                'type' => 'Sequence',
                'is_null' => false,
                'editable' => false,
                'readable' => true
            ),
            'key' => array(
                'type' => 'Varchar',
                'size' => 128,
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'value' => array(
                'type' => 'Varchar',
                'size' => 1024,
                'is_null' => true,
                'default' => 'empty',
                'editable' => true,
                'readable' => true
            ),
            'description' => array(
                'type' => 'Varchar',
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
                'type' => 'Foreignkey',
                'model' => 'TMS_Test',
                'name' => 'test',
                'graphql_name' => 'test',
                'relate_name' => 'variables',
                'graphql_field' => true,
                'is_null' => true,
                'editable' => true,
                'readable' => true
            )
        );
    }
}