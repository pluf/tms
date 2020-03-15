<?php
// Import
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
/**
 * Render class of GraphQl
 */
class Pluf_GraphQl_Schema_TMS_Scenario {
    public function render($rootValue, $query) {
        // render object types variables
         $TMS_Scenario = null;
         $TMS_VirtualUser = null;
         $TMS_Test = null;
         $TMS_Project = null;
         $User_Account = null;
         $User_Group = null;
         $User_Role = null;
         $User_Message = null;
         $User_Profile = null;
         $User_Avatar = null;
         $User_Verification = null;
         $User_Email = null;
         $User_Phone = null;
         $User_Address = null;
         $TMS_TestHistory = null;
         $TMS_TestComment = null;
         $TMS_ActivityComment = null;
         $TMS_Activity = null;
         $TMS_ActivityStep = null;
         $TMS_ActivityLog = null;
         $TMS_ActivityOutput = null;
         $TMS_Requirement = null;
         $TMS_TestRisk = null;
         $TMS_TestVariable = null;
         $TMS_TestAttachment = null;
         $TMS_TestRun = null;
         $Pluf_Jms_Pipeline = null;
         $Pluf_Jms_Label = null;
         $TMS_TestRunReport = null;
        // render code
         //
        $TMS_Scenario = new ObjectType([
            'name' => 'TMS_Scenario',
            'fields' => function () use (&$TMS_VirtualUser){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //mime_type: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [default] => application/octet-stream    [editable] => 1)
                    'mime_type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->mime_type;
                        },
                    ],
                    //file_name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 250    [default] => unknown    [editable] => )
                    'file_name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->file_name;
                        },
                    ],
                    //file_size: Array(    [type] => Pluf_DB_Field_Integer    [is_null] =>     [editable] => )
                    'file_size' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->file_size;
                        },
                    ],
                    //modif_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [blank] => 1    [editable] => )
                    'modif_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->modif_dtime;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //type: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 128    [is_null] =>     [default] =>     [editable] => 1    [readable] => 1)
                    'type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->type;
                        },
                    ],
                    //Foreinkey value-virtual_user_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_VirtualUser    [name] => virtual_user    [graphql_name] => virtual_user    [relate_name] => scenarios    [is_null] =>     [editable] => 1    [readable] => 1)
                    'virtual_user_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->virtual_user_id;
                            },
                    ],
                    //Foreinkey object-virtual_user_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_VirtualUser    [name] => virtual_user    [graphql_name] => virtual_user    [relate_name] => scenarios    [is_null] =>     [editable] => 1    [readable] => 1)
                    'virtual_user' => [
                            'type' => $TMS_VirtualUser,
                            'resolve' => function ($root) {
                                return $root->get_virtual_user();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_VirtualUser = new ObjectType([
            'name' => 'TMS_VirtualUser',
            'fields' => function () use (&$TMS_Test, &$TMS_Scenario){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //mime_type: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [default] => application/octet-stream    [editable] => 1)
                    'mime_type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->mime_type;
                        },
                    ],
                    //file_name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 250    [default] => unknown    [editable] => )
                    'file_name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->file_name;
                        },
                    ],
                    //file_size: Array(    [type] => Pluf_DB_Field_Integer    [is_null] =>     [editable] => )
                    'file_size' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->file_size;
                        },
                    ],
                    //modif_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [blank] => 1    [editable] => )
                    'modif_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->modif_dtime;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //type: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 128    [is_null] =>     [editable] => 1    [readable] => 1)
                    'type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->type;
                        },
                    ],
                    //Foreinkey value-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [graphql_name] => test    [relate_name] => virtual_users    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->test_id;
                            },
                    ],
                    //Foreinkey object-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [graphql_name] => test    [relate_name] => virtual_users    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test' => [
                            'type' => $TMS_Test,
                            'resolve' => function ($root) {
                                return $root->get_test();
                            },
                    ],
                    // relations: forenkey
                    
                    //Foreinkey list-virtual_user_id: Array()
                    'scenarios' => [
                            'type' => Type::listOf($TMS_Scenario),
                            'resolve' => function ($root) {
                                return $root->get_scenarios_list();
                            },
                    ],
                    
                ];
            }
        ]); //
        $TMS_Test = new ObjectType([
            'name' => 'TMS_Test',
            'fields' => function () use (&$TMS_Project, &$User_Account, &$TMS_Requirement, &$TMS_TestRisk, &$TMS_TestVariable, &$TMS_TestAttachment, &$TMS_TestRun, &$TMS_TestHistory, &$TMS_TestComment, &$TMS_VirtualUser, &$TMS_ActivityLog){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //type: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 128    [is_null] => 1    [default] => functional    [editable] => 1    [readable] => 1)
                    'type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->type;
                        },
                    ],
                    //design: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 128    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'design' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->design;
                        },
                    ],
                    //state: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 64    [default] => in_progress    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'state' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->state;
                        },
                    ],
                    //result: Array(    [type] => Pluf_DB_Field_Boolean    [is_null] =>     [default] =>     [editable] => )
                    'result' => [
                        'type' => Type::boolean(),
                        'resolve' => function ($root) {
                            return $root->result;
                        },
                    ],
                    //is_accepted: Array(    [type] => Pluf_DB_Field_Boolean    [is_null] => 1    [default] =>     [editable] => 1)
                    'is_accepted' => [
                        'type' => Type::boolean(),
                        'resolve' => function ($root) {
                            return $root->is_accepted;
                        },
                    ],
                    //start_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'start_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->start_dtime;
                        },
                    ],
                    //end_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'end_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->end_dtime;
                        },
                    ],
                    //Foreinkey value-project_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Project    [name] => project    [relate_name] => tests    [graphql_name] => project    [graphql_field] => 1    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'project_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->project_id;
                            },
                    ],
                    //Foreinkey object-project_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Project    [name] => project    [relate_name] => tests    [graphql_name] => project    [graphql_field] => 1    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'project' => [
                            'type' => $TMS_Project,
                            'resolve' => function ($root) {
                                return $root->get_project();
                            },
                    ],
                    //Foreinkey value-responsible_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => responsible    [graphql_name] => responsible    [relate_name] => tests    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'responsible_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->responsible_id;
                            },
                    ],
                    //Foreinkey object-responsible_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => responsible    [graphql_name] => responsible    [relate_name] => tests    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'responsible' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_responsible();
                            },
                    ],
                    //Foreinkey value-members: Array(    [type] => Pluf_DB_Field_Manytomany    [model] => User_Account    [name] => members    [graphql_name] => members    [relate_name] => tests    [is_null] => 1    [editable] => )
                    'members' => [
                            'type' => Type::listOf($User_Account),
                            'resolve' => function ($root) {
                                return $root->get_members_list();
                            },
                    ],
                    //Foreinkey value-requirements: Array(    [type] => Pluf_DB_Field_Manytomany    [model] => TMS_Requirement    [name] => requirements    [graphql_name] => requirements    [relate_name] => tests    [is_null] => 1    [editable] => )
                    'requirements' => [
                            'type' => Type::listOf($TMS_Requirement),
                            'resolve' => function ($root) {
                                return $root->get_requirements_list();
                            },
                    ],
                    // relations: forenkey
                    
                    //Foreinkey list-test_id: Array()
                    'risks' => [
                            'type' => Type::listOf($TMS_TestRisk),
                            'resolve' => function ($root) {
                                return $root->get_risks_list();
                            },
                    ],
                    //Foreinkey list-test_id: Array()
                    'variables' => [
                            'type' => Type::listOf($TMS_TestVariable),
                            'resolve' => function ($root) {
                                return $root->get_variables_list();
                            },
                    ],
                    //Foreinkey list-test_id: Array()
                    'attachments' => [
                            'type' => Type::listOf($TMS_TestAttachment),
                            'resolve' => function ($root) {
                                return $root->get_attachments_list();
                            },
                    ],
                    //Foreinkey list-test_id: Array()
                    'runs' => [
                            'type' => Type::listOf($TMS_TestRun),
                            'resolve' => function ($root) {
                                return $root->get_runs_list();
                            },
                    ],
                    //Foreinkey list-test_id: Array()
                    'histories' => [
                            'type' => Type::listOf($TMS_TestHistory),
                            'resolve' => function ($root) {
                                return $root->get_histories_list();
                            },
                    ],
                    //Foreinkey list-test_id: Array()
                    'comments' => [
                            'type' => Type::listOf($TMS_TestComment),
                            'resolve' => function ($root) {
                                return $root->get_comments_list();
                            },
                    ],
                    //Foreinkey list-test_id: Array()
                    'virtual_users' => [
                            'type' => Type::listOf($TMS_VirtualUser),
                            'resolve' => function ($root) {
                                return $root->get_virtual_users_list();
                            },
                    ],
                    //Foreinkey list-test_id: Array()
                    'logs' => [
                            'type' => Type::listOf($TMS_ActivityLog),
                            'resolve' => function ($root) {
                                return $root->get_logs_list();
                            },
                    ],
                    
                ];
            }
        ]); //
        $TMS_Project = new ObjectType([
            'name' => 'TMS_Project',
            'fields' => function () use (&$User_Account, &$TMS_Test, &$TMS_Requirement, &$TMS_ActivityLog){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //logo: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 512    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'logo' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->logo;
                        },
                    ],
                    //state: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 64    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'state' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->state;
                        },
                    ],
                    //start_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'start_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->start_dtime;
                        },
                    ],
                    //end_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'end_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->end_dtime;
                        },
                    ],
                    //Foreinkey value-manager_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => manager    [graphql_name] => manager    [relate_name] => projects    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'manager_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->manager_id;
                            },
                    ],
                    //Foreinkey object-manager_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => manager    [graphql_name] => manager    [relate_name] => projects    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'manager' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_manager();
                            },
                    ],
                    //Foreinkey value-members: Array(    [type] => Pluf_DB_Field_Manytomany    [model] => User_Account    [name] => members    [graphql_name] => members    [relate_name] => projects    [is_null] =>     [editable] => )
                    'members' => [
                            'type' => Type::listOf($User_Account),
                            'resolve' => function ($root) {
                                return $root->get_members_list();
                            },
                    ],
                    // relations: forenkey
                    
                    //Foreinkey list-project_id: Array()
                    'tests' => [
                            'type' => Type::listOf($TMS_Test),
                            'resolve' => function ($root) {
                                return $root->get_tests_list();
                            },
                    ],
                    //Foreinkey list-project_id: Array()
                    'requirements' => [
                            'type' => Type::listOf($TMS_Requirement),
                            'resolve' => function ($root) {
                                return $root->get_requirements_list();
                            },
                    ],
                    //Foreinkey list-project_id: Array()
                    'logs' => [
                            'type' => Type::listOf($TMS_ActivityLog),
                            'resolve' => function ($root) {
                                return $root->get_logs_list();
                            },
                    ],
                    
                ];
            }
        ]); //
        $User_Account = new ObjectType([
            'name' => 'User_Account',
            'fields' => function () use (&$User_Group, &$User_Role, &$User_Message, &$User_Profile, &$User_Avatar, &$User_Verification, &$User_Email, &$User_Phone, &$User_Address, &$TMS_Project, &$TMS_Test, &$TMS_TestHistory, &$TMS_TestComment, &$TMS_ActivityComment, &$TMS_ActivityLog){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] => 1    [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //login: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [unique] => 1    [size] => 50    [editable] =>     [readable] => 1)
                    'login' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->login;
                        },
                    ],
                    //date_joined: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [editable] => )
                    'date_joined' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->date_joined;
                        },
                    ],
                    //last_login: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [editable] => )
                    'last_login' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->last_login;
                        },
                    ],
                    //is_active: Array(    [type] => Pluf_DB_Field_Boolean    [is_null] =>     [default] =>     [editable] => )
                    'is_active' => [
                        'type' => Type::boolean(),
                        'resolve' => function ($root) {
                            return $root->is_active;
                        },
                    ],
                    //is_deleted: Array(    [type] => Pluf_DB_Field_Boolean    [is_null] =>     [default] =>     [editable] => )
                    'is_deleted' => [
                        'type' => Type::boolean(),
                        'resolve' => function ($root) {
                            return $root->is_deleted;
                        },
                    ],
                    //Foreinkey value-groups: Array(    [type] => Pluf_DB_Field_Manytomany    [blank] => 1    [model] => User_Group    [relate_name] => accounts    [editable] =>     [graphql_name] => groups    [readable] => 1)
                    'groups' => [
                            'type' => Type::listOf($User_Group),
                            'resolve' => function ($root) {
                                return $root->get_groups_list();
                            },
                    ],
                    //Foreinkey value-roles: Array(    [type] => Pluf_DB_Field_Manytomany    [blank] => 1    [relate_name] => accounts    [editable] =>     [model] => User_Role    [graphql_name] => roles    [readable] => 1)
                    'roles' => [
                            'type' => Type::listOf($User_Role),
                            'resolve' => function ($root) {
                                return $root->get_roles_list();
                            },
                    ],
                    // relations: forenkey
                    
                    //Foreinkey list-account_id: Array()
                    'messages' => [
                            'type' => Type::listOf($User_Message),
                            'resolve' => function ($root) {
                                return $root->get_messages_list();
                            },
                    ],
                    //Foreinkey list-account_id: Array()
                    'profiles' => [
                            'type' => Type::listOf($User_Profile),
                            'resolve' => function ($root) {
                                return $root->get_profiles_list();
                            },
                    ],
                    //Foreinkey list-account_id: Array()
                    'avatars' => [
                            'type' => Type::listOf($User_Avatar),
                            'resolve' => function ($root) {
                                return $root->get_avatars_list();
                            },
                    ],
                    //Foreinkey list-account_id: Array()
                    'verifications' => [
                            'type' => Type::listOf($User_Verification),
                            'resolve' => function ($root) {
                                return $root->get_verifications_list();
                            },
                    ],
                    //Foreinkey list-account_id: Array()
                    'emails' => [
                            'type' => Type::listOf($User_Email),
                            'resolve' => function ($root) {
                                return $root->get_emails_list();
                            },
                    ],
                    //Foreinkey list-account_id: Array()
                    'phones' => [
                            'type' => Type::listOf($User_Phone),
                            'resolve' => function ($root) {
                                return $root->get_phones_list();
                            },
                    ],
                    //Foreinkey list-account_id: Array()
                    'addresses' => [
                            'type' => Type::listOf($User_Address),
                            'resolve' => function ($root) {
                                return $root->get_addresses_list();
                            },
                    ],
                    //Foreinkey list-manager_id: Array()
                    'projects' => [
                            'type' => Type::listOf($TMS_Project),
                            'resolve' => function ($root) {
                                return $root->get_projects_list();
                            },
                    ],
                    //Foreinkey list-responsible_id: Array()
                    'tests' => [
                            'type' => Type::listOf($TMS_Test),
                            'resolve' => function ($root) {
                                return $root->get_tests_list();
                            },
                    ],
                    //Foreinkey list-account_id: Array()
                    'test_histories' => [
                            'type' => Type::listOf($TMS_TestHistory),
                            'resolve' => function ($root) {
                                return $root->get_test_histories_list();
                            },
                    ],
                    //Foreinkey list-writer_id: Array()
                    'test_comments' => [
                            'type' => Type::listOf($TMS_TestComment),
                            'resolve' => function ($root) {
                                return $root->get_test_comments_list();
                            },
                    ],
                    //Foreinkey list-writer_id: Array()
                    'activity_comments' => [
                            'type' => Type::listOf($TMS_ActivityComment),
                            'resolve' => function ($root) {
                                return $root->get_activity_comments_list();
                            },
                    ],
                    //Foreinkey list-writer_id: Array()
                    'logs' => [
                            'type' => Type::listOf($TMS_ActivityLog),
                            'resolve' => function ($root) {
                                return $root->get_logs_list();
                            },
                    ],
                    
                ];
            }
        ]); //
        $User_Group = new ObjectType([
            'name' => 'User_Group',
            'fields' => function () use (&$User_Role, &$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] => 1    [readable] => 1    [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 50    [verbose] => name)
                    'name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->name;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 250    [verbose] => description)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //Foreinkey value-roles: Array(    [type] => Pluf_DB_Field_Manytomany    [model] => User_Role    [is_null] => 1    [editable] =>     [relate_name] => groups    [graphql_name] => roles)
                    'roles' => [
                            'type' => Type::listOf($User_Role),
                            'resolve' => function ($root) {
                                return $root->get_roles_list();
                            },
                    ],
                    // relations: forenkey
                    
                    
                    //Foreinkey list-groups: Array()
                    'accounts' => [
                            'type' => Type::listOf($User_Account),
                            'resolve' => function ($root) {
                                return $root->get_accounts_list();
                            },
                    ],
                ];
            }
        ]); //
        $User_Role = new ObjectType([
            'name' => 'User_Role',
            'fields' => function () use (&$User_Account, &$User_Group){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] => 1    [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 50    [verbose] => name)
                    'name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->name;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 250    [verbose] => description)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //application: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 150    [is_null] =>     [verbose] => application    [help_text] => The application using this permission, for example "YourApp", "CMS" or "SView".)
                    'application' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->application;
                        },
                    ],
                    //code_name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 100    [verbose] => code name    [help_text] => The code name must be unique for each application. Standard permissions to manage a model in the interface are "Model_Name-create", "Model_Name-update", "Model_Name-list" and "Model_Name-delete".)
                    'code_name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->code_name;
                        },
                    ],
                    // relations: forenkey
                    
                    
                    //Foreinkey list-roles: Array()
                    'accounts' => [
                            'type' => Type::listOf($User_Account),
                            'resolve' => function ($root) {
                                return $root->get_accounts_list();
                            },
                    ],
                    //Foreinkey list-roles: Array()
                    'groups' => [
                            'type' => Type::listOf($User_Group),
                            'resolve' => function ($root) {
                                return $root->get_groups_list();
                            },
                    ],
                ];
            }
        ]); //
        $User_Message = new ObjectType([
            'name' => 'User_Message',
            'fields' => function () use (&$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] => 1    [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //Foreinkey value-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [graphql_name] => account    [relate_name] => messages    [is_null] =>     [editable] => )
                    'account_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->account_id;
                            },
                    ],
                    //Foreinkey object-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [graphql_name] => account    [relate_name] => messages    [is_null] =>     [editable] => )
                    'account' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_account();
                            },
                    ],
                    //message: Array(    [type] => Pluf_DB_Field_Text    [is_null] =>     [editable] =>     [readable] => 1)
                    'message' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->message;
                        },
                    ],
                    //creation_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [editable] =>     [readable] => 1)
                    'creation_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->creation_dtime;
                        },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $User_Profile = new ObjectType([
            'name' => 'User_Profile',
            'fields' => function () use (&$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] => 1    [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //first_name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 100    [editable] => 1)
                    'first_name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->first_name;
                        },
                    ],
                    //last_name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 100    [editable] => 1)
                    'last_name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->last_name;
                        },
                    ],
                    //public_email: Array(    [type] => Pluf_DB_Field_Email    [is_null] => 1    [editable] =>     [readable] => 1)
                    'public_email' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->public_email;
                        },
                    ],
                    //language: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [default] => en    [size] => 5    [editable] => 1)
                    'language' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->language;
                        },
                    ],
                    //timezone: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [default] => UTC    [size] => 45    [verbose] => time zone    [help_text] => Time zone of the user to display the time in local time.    [editable] => 1)
                    'timezone' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->timezone;
                        },
                    ],
                    //national_code: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 32    [editable] => 1)
                    'national_code' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->national_code;
                        },
                    ],
                    //gender: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 16    [editable] => 1)
                    'gender' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->gender;
                        },
                    ],
                    //weight: Array(    [type] => Pluf_DB_Field_Float    [is_null] => 1    [editable] => 1)
                    'weight' => [
                        'type' => Type::float(),
                        'resolve' => function ($root) {
                            return $root->weight;
                        },
                    ],
                    //birthday: Array(    [type] => Pluf_DB_Field_Date    [default] => 0000-00-00    [is_null] => 1    [editable] => 1)
                    'birthday' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->birthday;
                        },
                    ],
                    //Foreinkey value-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [relate_name] => profiles    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->account_id;
                            },
                    ],
                    //Foreinkey object-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [relate_name] => profiles    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_account();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $User_Avatar = new ObjectType([
            'name' => 'User_Avatar',
            'fields' => function () use (&$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] => 1    [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //fileName: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [unique] =>     [editable] => )
                    'fileName' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->fileName;
                        },
                    ],
                    //filePath: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [unique] =>     [editable] => )
                    'filePath' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->filePath;
                        },
                    ],
                    //fileSize: Array(    [type] => Pluf_DB_Field_Integer    [is_null] =>     [verbose] => validate    [editable] => )
                    'fileSize' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->fileSize;
                        },
                    ],
                    //mimeType: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 50    [editable] => )
                    'mimeType' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->mimeType;
                        },
                    ],
                    //creationTime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] =>     [editable] => )
                    'creationTime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->creationTime;
                        },
                    ],
                    //modifTime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] =>     [editable] => )
                    'modifTime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->modifTime;
                        },
                    ],
                    //Foreinkey value-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [unique] => 1    [name] => account    [relate_name] => avatars    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->account_id;
                            },
                    ],
                    //Foreinkey object-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [unique] => 1    [name] => account    [relate_name] => avatars    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_account();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $User_Verification = new ObjectType([
            'name' => 'User_Verification',
            'fields' => function () use (&$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] => 1    [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //expiry_count: Array(    [type] => Pluf_DB_Field_Integer    [editable] => )
                    'expiry_count' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->expiry_count;
                        },
                    ],
                    //expiry_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [editable] => )
                    'expiry_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->expiry_dtime;
                        },
                    ],
                    //creation_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] =>     [editable] => )
                    'creation_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->creation_dtime;
                        },
                    ],
                    //Foreinkey value-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [relate_name] => verifications    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->account_id;
                            },
                    ],
                    //Foreinkey object-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [relate_name] => verifications    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_account();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $User_Email = new ObjectType([
            'name' => 'User_Email',
            'fields' => function () use (&$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] => 1    [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //email: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 128    [editable] =>     [readable] => 1)
                    'email' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->email;
                        },
                    ],
                    //type: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [editable] => 1    [readable] => 1)
                    'type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->type;
                        },
                    ],
                    //is_verified: Array(    [type] => Pluf_DB_Field_Boolean    [is_null] =>     [editable] =>     [readable] => 1)
                    'is_verified' => [
                        'type' => Type::boolean(),
                        'resolve' => function ($root) {
                            return $root->is_verified;
                        },
                    ],
                    //Foreinkey value-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [relate_name] => emails    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->account_id;
                            },
                    ],
                    //Foreinkey object-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [relate_name] => emails    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_account();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $User_Phone = new ObjectType([
            'name' => 'User_Phone',
            'fields' => function () use (&$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] => 1    [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //phone: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 32    [editable] =>     [readable] => 1)
                    'phone' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->phone;
                        },
                    ],
                    //type: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [editable] => 1    [readable] => 1)
                    'type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->type;
                        },
                    ],
                    //is_verified: Array(    [type] => Pluf_DB_Field_Boolean    [is_null] =>     [editable] =>     [readable] => 1)
                    'is_verified' => [
                        'type' => Type::boolean(),
                        'resolve' => function ($root) {
                            return $root->is_verified;
                        },
                    ],
                    //Foreinkey value-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [relate_name] => phones    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->account_id;
                            },
                    ],
                    //Foreinkey object-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [relate_name] => phones    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_account();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $User_Address = new ObjectType([
            'name' => 'User_Address',
            'fields' => function () use (&$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] => 1    [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //country: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 64    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'country' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->country;
                        },
                    ],
                    //province: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 64    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'province' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->province;
                        },
                    ],
                    //city: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 64    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'city' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->city;
                        },
                    ],
                    //address: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 512    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'address' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->address;
                        },
                    ],
                    //postal_code: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 16    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'postal_code' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->postal_code;
                        },
                    ],
                    //location: Array(    [type] => Pluf_DB_Field_Geometry    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'location' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->location;
                        },
                    ],
                    //type: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [editable] => 1    [readable] => 1)
                    'type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->type;
                        },
                    ],
                    //is_verified: Array(    [type] => Pluf_DB_Field_Boolean    [is_null] =>     [editable] =>     [readable] => 1)
                    'is_verified' => [
                        'type' => Type::boolean(),
                        'resolve' => function ($root) {
                            return $root->is_verified;
                        },
                    ],
                    //Foreinkey value-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [relate_name] => addresses    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->account_id;
                            },
                    ],
                    //Foreinkey object-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [relate_name] => addresses    [graphql_name] => account    [is_null] =>     [editable] => )
                    'account' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_account();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_TestHistory = new ObjectType([
            'name' => 'TMS_TestHistory',
            'fields' => function () use (&$TMS_Test, &$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //action: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 64    [is_null] => 1    [editable] =>     [readable] => 1)
                    'action' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->action;
                        },
                    ],
                    //creation_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] =>     [editable] =>     [readable] => 1)
                    'creation_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->creation_dtime;
                        },
                    ],
                    //Foreinkey value-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [graphql_name] => test    [graphql_field] => 1    [relate_name] => histories    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'test_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->test_id;
                            },
                    ],
                    //Foreinkey object-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [graphql_name] => test    [graphql_field] => 1    [relate_name] => histories    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'test' => [
                            'type' => $TMS_Test,
                            'resolve' => function ($root) {
                                return $root->get_test();
                            },
                    ],
                    //Foreinkey value-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [graphql_name] => account    [graphql_field] => 1    [relate_name] => test_histories    [is_null] =>     [editable] =>     [readable] => 1)
                    'account_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->account_id;
                            },
                    ],
                    //Foreinkey object-account_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => account    [graphql_name] => account    [graphql_field] => 1    [relate_name] => test_histories    [is_null] =>     [editable] =>     [readable] => 1)
                    'account' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_account();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_TestComment = new ObjectType([
            'name' => 'TMS_TestComment',
            'fields' => function () use (&$TMS_Test, &$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //mime_type: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 128    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'mime_type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->mime_type;
                        },
                    ],
                    //text: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 2048    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'text' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->text;
                        },
                    ],
                    //creation_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] =>     [editable] =>     [readable] => 1)
                    'creation_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->creation_dtime;
                        },
                    ],
                    //Foreinkey value-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [relate_name] => comments    [graphql_name] => test    [graphql_field] => 1    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->test_id;
                            },
                    ],
                    //Foreinkey object-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [relate_name] => comments    [graphql_name] => test    [graphql_field] => 1    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test' => [
                            'type' => $TMS_Test,
                            'resolve' => function ($root) {
                                return $root->get_test();
                            },
                    ],
                    //Foreinkey value-writer_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => writer    [relate_name] => test_comments    [graphql_name] => writer    [graphql_field] => 1    [is_null] =>     [editable] =>     [readable] => 1)
                    'writer_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->writer_id;
                            },
                    ],
                    //Foreinkey object-writer_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => writer    [relate_name] => test_comments    [graphql_name] => writer    [graphql_field] => 1    [is_null] =>     [editable] =>     [readable] => 1)
                    'writer' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_writer();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_ActivityComment = new ObjectType([
            'name' => 'TMS_ActivityComment',
            'fields' => function () use (&$TMS_Activity, &$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //mime_type: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 128    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'mime_type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->mime_type;
                        },
                    ],
                    //text: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 2048    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'text' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->text;
                        },
                    ],
                    //creation_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] =>     [editable] =>     [readable] => 1)
                    'creation_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->creation_dtime;
                        },
                    ],
                    //Foreinkey value-activity_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Activity    [name] => activity    [relate_name] => comments    [graphql_field] => 1    [graphql_name] => activity    [is_null] =>     [editable] => 1    [readable] => 1)
                    'activity_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->activity_id;
                            },
                    ],
                    //Foreinkey object-activity_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Activity    [name] => activity    [relate_name] => comments    [graphql_field] => 1    [graphql_name] => activity    [is_null] =>     [editable] => 1    [readable] => 1)
                    'activity' => [
                            'type' => $TMS_Activity,
                            'resolve' => function ($root) {
                                return $root->get_activity();
                            },
                    ],
                    //Foreinkey value-writer_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => writer    [relate_name] => activity_comments    [graphql_field] => 1    [graphql_name] => writer    [is_null] =>     [editable] =>     [readable] => 1)
                    'writer_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->writer_id;
                            },
                    ],
                    //Foreinkey object-writer_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => writer    [relate_name] => activity_comments    [graphql_field] => 1    [graphql_name] => writer    [is_null] =>     [editable] =>     [readable] => 1)
                    'writer' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_writer();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_Activity = new ObjectType([
            'name' => 'TMS_Activity',
            'fields' => function () use (&$TMS_Project, &$TMS_Test, &$User_Account, &$TMS_ActivityStep, &$TMS_ActivityComment, &$TMS_ActivityLog, &$TMS_ActivityOutput){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //state: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 64    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'state' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->state;
                        },
                    ],
                    //type: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 128    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->type;
                        },
                    ],
                    //is_archived: Array(    [type] => Pluf_DB_Field_Boolean    [is_null] => 1    [default] =>     [editable] => 1)
                    'is_archived' => [
                        'type' => Type::boolean(),
                        'resolve' => function ($root) {
                            return $root->is_archived;
                        },
                    ],
                    //start_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'start_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->start_dtime;
                        },
                    ],
                    //end_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'end_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->end_dtime;
                        },
                    ],
                    //Foreinkey value-project_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Project    [name] => project    [relate_name] => activities    [graphql_name] => project    [graphql_field] => 1    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'project_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->project_id;
                            },
                    ],
                    //Foreinkey object-project_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Project    [name] => project    [relate_name] => activities    [graphql_name] => project    [graphql_field] => 1    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'project' => [
                            'type' => $TMS_Project,
                            'resolve' => function ($root) {
                                return $root->get_project();
                            },
                    ],
                    //Foreinkey value-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [relate_name] => activities    [graphql_name] => test    [graphql_field] => 1    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'test_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->test_id;
                            },
                    ],
                    //Foreinkey object-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [relate_name] => activities    [graphql_name] => test    [graphql_field] => 1    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'test' => [
                            'type' => $TMS_Test,
                            'resolve' => function ($root) {
                                return $root->get_test();
                            },
                    ],
                    //Foreinkey value-assign_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => assign    [graphql_name] => assign    [relate_name] => activities    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'assign_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->assign_id;
                            },
                    ],
                    //Foreinkey object-assign_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => assign    [graphql_name] => assign    [relate_name] => activities    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'assign' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_assign();
                            },
                    ],
                    //Foreinkey value-members: Array(    [type] => Pluf_DB_Field_Manytomany    [model] => User_Account    [name] => members    [graphql_name] => members    [relate_name] => activities    [is_null] => 1    [editable] => )
                    'members' => [
                            'type' => Type::listOf($User_Account),
                            'resolve' => function ($root) {
                                return $root->get_members_list();
                            },
                    ],
                    // relations: forenkey
                    
                    //Foreinkey list-activity_id: Array()
                    'steps' => [
                            'type' => Type::listOf($TMS_ActivityStep),
                            'resolve' => function ($root) {
                                return $root->get_steps_list();
                            },
                    ],
                    //Foreinkey list-activity_id: Array()
                    'comments' => [
                            'type' => Type::listOf($TMS_ActivityComment),
                            'resolve' => function ($root) {
                                return $root->get_comments_list();
                            },
                    ],
                    //Foreinkey list-activity_id: Array()
                    'logs' => [
                            'type' => Type::listOf($TMS_ActivityLog),
                            'resolve' => function ($root) {
                                return $root->get_logs_list();
                            },
                    ],
                    //Foreinkey list-activity_id: Array()
                    'outputs' => [
                            'type' => Type::listOf($TMS_ActivityOutput),
                            'resolve' => function ($root) {
                                return $root->get_outputs_list();
                            },
                    ],
                    
                ];
            }
        ]); //
        $TMS_ActivityStep = new ObjectType([
            'name' => 'TMS_ActivityStep',
            'fields' => function () use (&$TMS_Activity){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //order: Array(    [type] => Pluf_DB_Field_Integer    [is_null] =>     [default] => 0    [editable] => 1    [readable] => 1)
                    'order' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->order;
                        },
                    ],
                    //is_checked: Array(    [type] => Pluf_DB_Field_Boolean    [is_null] =>     [default] =>     [editable] => 1)
                    'is_checked' => [
                        'type' => Type::boolean(),
                        'resolve' => function ($root) {
                            return $root->is_checked;
                        },
                    ],
                    //Foreinkey value-activity_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Activity    [name] => activity    [relate_name] => steps    [graphql_name] => activity    [graphql_field] => 1    [is_null] =>     [editable] => 1    [readable] => 1)
                    'activity_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->activity_id;
                            },
                    ],
                    //Foreinkey object-activity_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Activity    [name] => activity    [relate_name] => steps    [graphql_name] => activity    [graphql_field] => 1    [is_null] =>     [editable] => 1    [readable] => 1)
                    'activity' => [
                            'type' => $TMS_Activity,
                            'resolve' => function ($root) {
                                return $root->get_activity();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_ActivityLog = new ObjectType([
            'name' => 'TMS_ActivityLog',
            'fields' => function () use (&$TMS_Project, &$TMS_Test, &$TMS_Activity, &$User_Account){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //duration: Array(    [type] => Pluf_DB_Field_Float    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'duration' => [
                        'type' => Type::float(),
                        'resolve' => function ($root) {
                            return $root->duration;
                        },
                    ],
                    //creation_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] =>     [editable] =>     [readable] => 1)
                    'creation_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->creation_dtime;
                        },
                    ],
                    //Foreinkey value-project_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Project    [name] => project    [graphql_name] => project    [relate_name] => logs    [is_null] =>     [editable] => 1    [readable] => 1)
                    'project_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->project_id;
                            },
                    ],
                    //Foreinkey object-project_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Project    [name] => project    [graphql_name] => project    [relate_name] => logs    [is_null] =>     [editable] => 1    [readable] => 1)
                    'project' => [
                            'type' => $TMS_Project,
                            'resolve' => function ($root) {
                                return $root->get_project();
                            },
                    ],
                    //Foreinkey value-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [graphql_name] => test    [relate_name] => logs    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->test_id;
                            },
                    ],
                    //Foreinkey object-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [graphql_name] => test    [relate_name] => logs    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test' => [
                            'type' => $TMS_Test,
                            'resolve' => function ($root) {
                                return $root->get_test();
                            },
                    ],
                    //Foreinkey value-activity_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Activity    [name] => activity    [graphql_name] => activity    [relate_name] => logs    [is_null] =>     [editable] => 1    [readable] => 1)
                    'activity_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->activity_id;
                            },
                    ],
                    //Foreinkey object-activity_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Activity    [name] => activity    [graphql_name] => activity    [relate_name] => logs    [is_null] =>     [editable] => 1    [readable] => 1)
                    'activity' => [
                            'type' => $TMS_Activity,
                            'resolve' => function ($root) {
                                return $root->get_activity();
                            },
                    ],
                    //Foreinkey value-writer_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => writer    [graphql_name] => writer    [relate_name] => logs    [is_null] => 1    [editable] =>     [readable] => 1)
                    'writer_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->writer_id;
                            },
                    ],
                    //Foreinkey object-writer_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => User_Account    [name] => writer    [graphql_name] => writer    [relate_name] => logs    [is_null] => 1    [editable] =>     [readable] => 1)
                    'writer' => [
                            'type' => $User_Account,
                            'resolve' => function ($root) {
                                return $root->get_writer();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_ActivityOutput = new ObjectType([
            'name' => 'TMS_ActivityOutput',
            'fields' => function () use (&$TMS_Activity){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //Foreinkey value-activity_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Activity    [name] => activity    [graphql_name] => activity    [relate_name] => outputs    [is_null] =>     [editable] => 1    [readable] => 1)
                    'activity_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->activity_id;
                            },
                    ],
                    //Foreinkey object-activity_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Activity    [name] => activity    [graphql_name] => activity    [relate_name] => outputs    [is_null] =>     [editable] => 1    [readable] => 1)
                    'activity' => [
                            'type' => $TMS_Activity,
                            'resolve' => function ($root) {
                                return $root->get_activity();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_Requirement = new ObjectType([
            'name' => 'TMS_Requirement',
            'fields' => function () use (&$TMS_Project, &$TMS_Test){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //type: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 128    [is_null] => 1    [default] => functional    [editable] => 1    [readable] => 1)
                    'type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->type;
                        },
                    ],
                    //Foreinkey value-project_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Project    [name] => project    [relate_name] => requirements    [graphql_field] => 1    [graphql_name] => project    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'project_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->project_id;
                            },
                    ],
                    //Foreinkey object-project_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Project    [name] => project    [relate_name] => requirements    [graphql_field] => 1    [graphql_name] => project    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'project' => [
                            'type' => $TMS_Project,
                            'resolve' => function ($root) {
                                return $root->get_project();
                            },
                    ],
                    // relations: forenkey
                    
                    
                    //Foreinkey list-requirements: Array()
                    'tests' => [
                            'type' => Type::listOf($TMS_Test),
                            'resolve' => function ($root) {
                                return $root->get_tests_list();
                            },
                    ],
                ];
            }
        ]); //
        $TMS_TestRisk = new ObjectType([
            'name' => 'TMS_TestRisk',
            'fields' => function () use (&$TMS_Test){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [blank] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //effect: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 1024    [editable] => 1    [readable] => 1)
                    'effect' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->effect;
                        },
                    ],
                    //probability: Array(    [type] => Pluf_DB_Field_Float    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'probability' => [
                        'type' => Type::float(),
                        'resolve' => function ($root) {
                            return $root->probability;
                        },
                    ],
                    //Foreinkey value-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [relate_name] => risks    [graphql_name] => test    [graphql_field] => 1    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->test_id;
                            },
                    ],
                    //Foreinkey object-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [relate_name] => risks    [graphql_name] => test    [graphql_field] => 1    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test' => [
                            'type' => $TMS_Test,
                            'resolve' => function ($root) {
                                return $root->get_test();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_TestVariable = new ObjectType([
            'name' => 'TMS_TestVariable',
            'fields' => function () use (&$TMS_Test){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] =>     [readable] => 1)
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //key: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 128    [is_null] =>     [editable] => 1    [readable] => 1)
                    'key' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->key;
                        },
                    ],
                    //value: Array(    [type] => Pluf_DB_Field_Varchar    [size] => 1024    [is_null] => 1    [default] => empty    [editable] => 1    [readable] => 1)
                    'value' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->value;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 1024    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //Foreinkey value-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [graphql_name] => test    [relate_name] => variables    [graphql_field] => 1    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'test_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->test_id;
                            },
                    ],
                    //Foreinkey object-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [graphql_name] => test    [relate_name] => variables    [graphql_field] => 1    [is_null] => 1    [editable] => 1    [readable] => 1)
                    'test' => [
                            'type' => $TMS_Test,
                            'resolve' => function ($root) {
                                return $root->get_test();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_TestAttachment = new ObjectType([
            'name' => 'TMS_TestAttachment',
            'fields' => function () use (&$TMS_Test){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //mime_type: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [default] => application/octet-stream    [editable] => 1)
                    'mime_type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->mime_type;
                        },
                    ],
                    //file_name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 250    [default] => unknown    [editable] => )
                    'file_name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->file_name;
                        },
                    ],
                    //file_size: Array(    [type] => Pluf_DB_Field_Integer    [is_null] =>     [editable] => )
                    'file_size' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->file_size;
                        },
                    ],
                    //modif_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [blank] => 1    [editable] => )
                    'modif_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->modif_dtime;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //Foreinkey value-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [relate_name] => attachments    [graphql_name] => test    [graphql_field] => 1    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->test_id;
                            },
                    ],
                    //Foreinkey object-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [relate_name] => attachments    [graphql_name] => test    [graphql_field] => 1    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test' => [
                            'type' => $TMS_Test,
                            'resolve' => function ($root) {
                                return $root->get_test();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_TestRun = new ObjectType([
            'name' => 'TMS_TestRun',
            'fields' => function () use (&$TMS_Test, &$Pluf_Jms_Pipeline, &$TMS_TestRunReport){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //mime_type: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [default] => application/octet-stream    [editable] => 1)
                    'mime_type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->mime_type;
                        },
                    ],
                    //file_name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 250    [default] => unknown    [editable] => )
                    'file_name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->file_name;
                        },
                    ],
                    //file_size: Array(    [type] => Pluf_DB_Field_Integer    [is_null] =>     [editable] => )
                    'file_size' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->file_size;
                        },
                    ],
                    //modif_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [blank] => 1    [editable] => )
                    'modif_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->modif_dtime;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //start_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [blank] => 1    [default] => 0000-00-00 00:00:00    [editable] =>     [readable] => 1)
                    'start_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->start_dtime;
                        },
                    ],
                    //end_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [blank] => 1    [default] => 0000-00-00 00:00:00    [editable] =>     [readable] => 1)
                    'end_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->end_dtime;
                        },
                    ],
                    //folder_path: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 1024    [editable] => 1    [readable] => 1)
                    'folder_path' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->folder_path;
                        },
                    ],
                    //Foreinkey value-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [graphql_name] => test    [relate_name] => runs    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->test_id;
                            },
                    ],
                    //Foreinkey object-test_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_Test    [name] => test    [graphql_name] => test    [relate_name] => runs    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test' => [
                            'type' => $TMS_Test,
                            'resolve' => function ($root) {
                                return $root->get_test();
                            },
                    ],
                    //Foreinkey value-pipeline_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => Pluf\Jms\Pipeline    [name] => pipeline    [graphql_name] => pipeline    [relate_name] => runs    [is_null] =>     [editable] =>     [readable] => 1)
                    'pipeline_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->pipeline_id;
                            },
                    ],
                    //Foreinkey object-pipeline_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => Pluf\Jms\Pipeline    [name] => pipeline    [graphql_name] => pipeline    [relate_name] => runs    [is_null] =>     [editable] =>     [readable] => 1)
                    'pipeline' => [
                            'type' => $Pluf_Jms_Pipeline,
                            'resolve' => function ($root) {
                                return $root->get_pipeline();
                            },
                    ],
                    // relations: forenkey
                    
                    //Foreinkey list-test_run_id: Array()
                    'reports' => [
                            'type' => Type::listOf($TMS_TestRunReport),
                            'resolve' => function ($root) {
                                return $root->get_reports_list();
                            },
                    ],
                    
                ];
            }
        ]); //
        $Pluf_Jms_Pipeline = new ObjectType([
            'name' => 'Pluf\Jms\Pipeline',
            'fields' => function () use (&$Pluf_Jms_Label){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 256    [unique] =>     [editable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 2048    [unique] =>     [editable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //status: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 64    [default] => new    [unique] =>     [editable] => 1)
                    'status' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->status;
                        },
                    ],
                    //Foreinkey value-labels: Array(    [type] => Pluf_DB_Field_Manytomany    [model] => Pluf\Jms\Label    [is_null] => 1    [editable] =>     [name] => labels    [graphql_name] => labels    [relate_name] => pipelines)
                    'labels' => [
                            'type' => Type::listOf($Pluf_Jms_Label),
                            'resolve' => function ($root) {
                                return $root->get_labels_list();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $Pluf_Jms_Label = new ObjectType([
            'name' => 'Pluf\Jms\Label',
            'fields' => function () {
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 1024    [default] => name    [editable] => 1)
                    'name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->name;
                        },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $TMS_TestRunReport = new ObjectType([
            'name' => 'TMS_TestRunReport',
            'fields' => function () use (&$TMS_TestRun){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //mime_type: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [default] => application/octet-stream    [editable] => 1)
                    'mime_type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->mime_type;
                        },
                    ],
                    //file_name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 250    [default] => unknown    [editable] => )
                    'file_name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->file_name;
                        },
                    ],
                    //file_size: Array(    [type] => Pluf_DB_Field_Integer    [is_null] =>     [editable] => )
                    'file_size' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->file_size;
                        },
                    ],
                    //modif_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [blank] => 1    [editable] => )
                    'modif_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->modif_dtime;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 256    [editable] => 1    [readable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [blank] => 1    [is_null] => 1    [size] => 2048    [editable] => 1    [readable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //downloads: Array(    [type] => Pluf_DB_Field_Integer    [is_null] =>     [default] => 0    [editable] => )
                    'downloads' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->downloads;
                        },
                    ],
                    //creation_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [is_null] => 1    [editable] => )
                    'creation_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->creation_dtime;
                        },
                    ],
                    //Foreinkey value-test_run_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_TestRun    [name] => test_run    [graphql_name] => test_run    [relate_name] => reports    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test_run_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->test_run_id;
                            },
                    ],
                    //Foreinkey object-test_run_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => TMS_TestRun    [name] => test_run    [graphql_name] => test_run    [relate_name] => reports    [is_null] =>     [editable] => 1    [readable] => 1)
                    'test_run' => [
                            'type' => $TMS_TestRun,
                            'resolve' => function ($root) {
                                return $root->get_test_run();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]);$rootType =$TMS_Scenario;
        try {
            $schema = new Schema([
                'query' => $rootType
            ]);
            $result = GraphQL::executeQuery($schema, $query, $rootValue);
            return $result->toArray();
        } catch (Exception $e) {
            throw new Pluf_Exception_BadRequest($e->getMessage());
        }
    }
}
