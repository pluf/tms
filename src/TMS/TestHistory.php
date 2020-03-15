<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_TestHistory extends Pluf_Model
{

    /**
     *
     * {@inheritdoc}
     * @see Pluf_Model::init()
     */
    function init()
    {
        $this->_a['table'] = 'tms_test_histories';
        $this->_a['verbose'] = 'TMS Test History';
        $this->_a['cols'] = array(
            'id' => array(
                'type' => 'Pluf_DB_Field_Sequence',
                'blank' => false,
                'editable' => false,
                'readable' => true
            ),
            'title' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => false,
                'size' => 256,
                'editable' => true,
                'readable' => true
            ),
            'action' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 64,
                'is_null' => true,
                'editable' => false,
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
            'test_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_Test',
                'name' => 'test',
                'graphql_name' => 'test',
                'graphql_field' => true,
                'relate_name' => 'histories',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'account_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'User_Account',
                'name' => 'account',
                'graphql_name' => 'account',
                'graphql_field' => true,
                'relate_name' => 'test_histories',
                'is_null' => false,
                'editable' => false,
                'readable' => true
            )
        );
    }

    /**
     *
     * {@inheritdoc}
     * @see Pluf_Model::preSave()
     */
    function preSave($create = false)
    {
        if ($this->id == '') {
            $this->creation_dtime = gmdate('Y-m-d H:i:s');
        }
    }
}