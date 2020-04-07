<?php

class TMS_DocumentedModelBinary extends TMS_ModelBinary
{

    /**
     * 
     * {@inheritDoc}
     * @see TMS_ModelBinary::init()
     */
    function init()
    {
        parent::init();
        // $this->_a['table'] = 'tms_documentedmodelbinary';
        // $this->_a['verbose'] = 'TMS_DocumentedModelBinary';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'title' => array(
                'type' => 'Varchar',
                'blank' => true,
                'is_null' => true,
                'size' => 256,
                'editable' => true,
                'readable' => true
            ),
            'description' => array(
                'type' => 'Varchar',
                'blank' => true,
                'is_null' => true,
                'size' => 2048,
                'editable' => true,
                'readable' => true
            )
        ));
    }
}
