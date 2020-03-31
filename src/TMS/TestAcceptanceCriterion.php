<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_TestAcceptanceCriterion extends TMS_DocumentedModel
{

    /**
     * 
     * {@inheritDoc}
     * @see TMS_DocumentedModel::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_test_acceptance_criteria';
        $this->_a['verbose'] = 'TMS TestAcceptanceCriterion';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'metric' => array(
                'type' => 'Varchar',
                'size' => 64,
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'bound' => array(
                'type' => 'Float',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'bound_type' => array(
                'type' => 'Varchar',
                'size' => 128,
                'is_null' => false,
                'default' => 'upper',
                'editable' => true,
                'readable' => true
            ),
            'severity' => array(
                'type' => 'Varchar',
                'size' => 64,
                'is_null' => false,
                'default' => 'passed',
                'editable' => true,
                'readable' => true
            ),
            'duration' => array(
                'type' => 'Float',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'duration_type' => array(
                'type' => 'Varchar',
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
                'type' => 'Foreignkey',
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
        // Make titla as nullable field
        $this->_a['cols']['title']['is_null'] = true;
    }

}