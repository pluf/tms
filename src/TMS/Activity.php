<?php

/**
 * 
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_Activity extends TMS_DocumentedModel
{

    /**
     * مدل داده‌ای را بارگذاری می‌کند.
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_model = 'TMS_Activity';
        $this->_a['table'] = 'tms_activities';
        $this->_a['verbose'] = 'TMS Activity';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'state' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 64,
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'type' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 128,
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'is_archived' => array(
                'type' => 'Pluf_DB_Field_Boolean',
                'is_null' => true,
                'default' => false,
                'editable' => true
            ),
            'start_dtime' => array(
                'type' => 'Pluf_DB_Field_Datetime',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'end_dtime' => array(
                'type' => 'Pluf_DB_Field_Datetime',
                'is_null' => true,
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
                'relate_name' => 'activities',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'test_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'TMS_Test',
                'name' => 'test',
                'relate_name' => 'activities',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'assign_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'User_Account',
                'name' => 'responsible',
                'relate_name' => 'activities',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'members' => array(
                'type' => 'Pluf_DB_Field_Manytomany',
                'model' => 'User_Account',
                'name' => 'members',
                'graphql_name' => 'members',
                'relate_name' => 'activities',
                'is_null' => true,
                'editable' => false
            )
        ));
    }

    /**
     * Checks if given user is a memeber of zone
     *
     * @param User_Account $user
     * @return boolean
     */
    function isMember($user)
    {
        $usres = $this->get_members_list();
        foreach ($usres as $u)
            if ($u->getId() == $user->getId())
                return true;
        return false;
    }

    /**
     * Checks if the activity is assigned to the given user
     *
     * @param User_Account $user
     * @return boolean
     */
    function isAssigned($user)
    {
        return $this->get_assign()->getId() == $user->getId();
    }

}