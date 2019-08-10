<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_Requirement extends TMS_DocumentedModel
{

    /**
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_requirements';
        $this->_a['verbose'] = 'TMS Requirement';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'type' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 128,
                'is_null' => true,
                'default' => 'functional',
                'editable' => true,
                'readable' => true
            ),
            /*
             * Relations
             */
            'project_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_Project',
                'name' => 'project',
                'relate_name' => 'requirements',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            )
            // Note: Many to many relation with TMS_Test is defined in the TMS_Test class
        ));
    }

}