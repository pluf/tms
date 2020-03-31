<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_ActivityOutput extends TMS_DocumentedModel
{

    /**
     *
     * {@inheritdoc}
     * @see TMS_DocumentedModel::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_activity_outputs';
        $this->_a['verbose'] = 'TMS Activity Output';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            /*
             * Relations
             */
            'activity_id' => array(
                'type' => 'Foreignkey',
                'model' => 'TMS_Activity',
                'name' => 'activity',
                'graphql_name' => 'activity',
                'relate_name' => 'outputs',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            )
        ));
    }
}