<?php

class TMS_DocumentedModel extends Pluf_Model
{

    /**
     *
     * {@inheritdoc}
     * @see Pluf_Model::init()
     */
    function init()
    {
        $this->_a['cols'] = array(
            'id' => array(
                'type' => 'Sequence',
                'blank' => false,
                'editable' => false,
                'readable' => true
            ),
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
        );
    }
}
