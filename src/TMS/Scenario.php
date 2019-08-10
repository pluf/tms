<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_Scenario extends TMS_DocumentedModelBinary
{

    /**
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_scenarios';
        $this->_a['verbose'] = 'TMS Scenario';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'type' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 128,
                'is_null' => false,
                'default' => '',
                'editable' => true,
                'readable' => true
            ),
            /*
             * Relations
             */
            'virtual_user_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_VirtualUser',
                'name' => 'virtual_user',
                'relate_name' => 'scenarios',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            )
        ));
    }

}