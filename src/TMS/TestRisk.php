<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_TestRisk extends TMS_DocumentedModel
{

    /**
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_test_risks';
        $this->_a['verbose'] = 'TMS Test Risk';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'effect' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => true,
                'size' => 1024,
                'editable' => true,
                'readable' => true
            ),
            'probability' => array(
                'type' => 'Pluf_DB_Field_Float',
                'is_null' => true,
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
                'relate_name' => 'risks',
                'graphql_name' => 'test',
                'graphql_field' => true,
                'is_null' => false,
                'editable' => true,
                'readable' => true
            )
        ));
    }

}