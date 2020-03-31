<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_ActivityComment extends Pluf_Model
{

    /**
     *
     * {@inheritdoc}
     * @see Pluf_Model::init()
     */
    function init()
    {
        $this->_a['table'] = 'tms_activity_comments';
        $this->_a['verbose'] = 'TMS Activity Commment';
        $this->_a['cols'] = array(
            'id' => array(
                'type' => 'Sequence',
                'blank' => false,
                'editable' => false,
                'readable' => true
            ),
            'mime_type' => array(
                'type' => 'Varchar',
                'size' => 128,
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'text' => array(
                'type' => 'Varchar',
                'size' => 2048,
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'creation_dtime' => array(
                'type' => 'Datetime',
                'is_null' => false,
                'editable' => false,
                'readable' => true
            ),
            /*
             * Relations
             */
            'activity_id' => array(
                'type' => 'Foreignkey',
                'model' => 'TMS_Activity',
                'name' => 'activity',
                'relate_name' => 'comments',
                'graphql_field' => true,
                'graphql_name' => 'activity',
                'is_null' => false,
                'editable' => true,
                'readable' => true
            ),
            'writer_id' => array(
                'type' => 'Foreignkey',
                'model' => 'User_Account',
                'name' => 'writer',
                'relate_name' => 'activity_comments',
                'graphql_field' => true,
                'graphql_name' => 'writer',
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