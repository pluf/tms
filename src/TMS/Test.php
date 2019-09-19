<?php

/**
 *
 * @author hadi <mohammad.hadi.mansouri@dpq.co.ir>
 *
 */
class TMS_Test extends TMS_DocumentedModel
{

    /**
     * مدل داده‌ای را بارگذاری می‌کند.
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'tms_tests';
        $this->_a['verbose'] = 'TMS Test';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'type' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 128,
                'is_null' => true,
                'default' => 'functional',
                'editable' => true,
                'readable' => true
            ),
            'design' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 128,
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'state' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'size' => 64,
                'default' => 'in_progress',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'result' => array(
                'type' => 'Pluf_DB_Field_Boolean',
                'is_null' => false,
                'default' => false,
                'editable' => false
            ),
            'is_accepted' => array(
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
                'relate_name' => 'tests',
                'graphql_name' =>  'project',
                'graphql_field' => true,
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'responsible_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'User_Account',
                'name' => 'responsible',
                'graphql_name' => 'responsible',
                'relate_name' => 'tests',
                'is_null' => true,
                'editable' => true,
                'readable' => true
            ),
            'members' => array(
                'type' => 'Pluf_DB_Field_Manytomany',
                'model' => 'User_Account',
                'name' => 'members',
                'graphql_name' => 'members',
                'relate_name' => 'tests',
                'is_null' => true,
                'editable' => false
            ),
            'requirements' => array(
                'type' => 'Pluf_DB_Field_Manytomany',
                'model' => 'TMS_Requirement',
                'name' => 'requirements',
                'graphql_name' => 'requirements',
                'relate_name' => 'tests',
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
        $usres = $this->get_member_list();
        foreach ($usres as $u)
            if ($u->getId() == $user->getId())
                return true;
        return false;
    }

    /**
     * Checks if given user is responsible for the test
     *
     * @param User_Account $user
     * @return boolean
     */
    function isResponsible($user)
    {
        return $this->get_responsible()->getId() == $user->getId();
    }

    function isDesigned(){
        return isset($this->design) && !empty($this->design);
    }
    
}