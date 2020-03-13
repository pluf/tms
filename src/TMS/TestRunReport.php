<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_TestRunReport extends TMS_DocumentedModelBinary
{

    /**
     *
     * {@inheritdoc}
     * @see TMS_DocumentedModelBinary::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_test_run_reports';
        $this->_a['verbose'] = 'TMS Test Run Report';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'downloads' => array(
                'type' => 'Pluf_DB_Field_Integer',
                'is_null' => false,
                'default' => 0,
                'editable' => false
            ),
            'creation_dtime' => array(
                'type' => 'Pluf_DB_Field_Datetime',
                'is_null' => true,
                'editable' => false
            ),
            /*
             * Relations
             */
            'test_run_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_TestRun',
                'name' => 'test_run',
                'graphql_name' => 'test_run',
                'relate_name' => 'reports',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            )
        ));
    }

    /**
     * 
     * {@inheritDoc}
     * @see TMS_ModelBinary::preSave()
     */
    function preSave($create = false)
    {
        if ($this->id == '') {
            $this->creation_dtime = gmdate('Y-m-d H:i:s');
        }
        parent::preSave($create);
    }
}