<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_TestAcceptanceCriterion extends TMS_DocumentedModel
{

    /**
     * مدل داده‌ای را بارگذاری می‌کند.
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_test_acceptance_criteria';
        $this->_a['verbose'] = 'TMS TestAcceptanceCriterion';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'metric' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 64,
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'bound' => array(
                'type' => 'Pluf_DB_Field_Float',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'bound_type' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 128,
                'is_null' => false,
                'default' => 'upper',
                'editable' => true,
                'readable' => true
            ),
            'severity' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 64,
                'is_null' => false,
                'default' => 'passed',
                'editable' => true,
                'readable' => true
            ),
            'duration' => array(
                'type' => 'Pluf_DB_Field_Float',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'duration_type' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 128,
                'is_null' => false,
                'default' => 'second',
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
                'graphql_name' => 'test',
                'graphql_field' => true,
                'relate_name' => 'acceptanceCriteria',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            )
        ));
    }

}