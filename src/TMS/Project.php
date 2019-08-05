<?php

/**
 * 
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_Project extends TMS_DocumentedModel
{

    /**
     * مدل داده‌ای را بارگذاری می‌کند.
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_model = 'TMS_Project';
        $this->_a['table'] = 'tms_projects';
        $this->_a['verbose'] = 'TMS Project';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'logo' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 512,
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'state' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 64,
                'is_null' => true,
                'editable' => true,
                'readable' => true
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
            'manager_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'User_Account',
                'name' => 'manager',
                'graphql_name' => 'manager',
                'relate_name' => 'projects',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'members' => array(
                'type' => 'Pluf_DB_Field_Manytomany',
                'model' => 'User_Account',
                'name' => 'members',
                'graphql_name' => 'members',
                'relate_name' => 'projects',
                'is_null' => false,
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
     * Checks if given user is the manager of the project
     *
     * @param User_Account $user
     * @return boolean
     */
    function isManager($user)
    {
        return $this->get_manager()->getId() == $user->getId();
    }

}