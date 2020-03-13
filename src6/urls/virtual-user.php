<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-virtual-users/schema$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_VirtualUser'
        )
    ),
    // ************************************************************* Virtual-User
    array( // Create
        'regex' => '#^/test-virtual-users$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'create',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-virtual-users/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_VirtualUser'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/test-virtual-users$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_VirtualUser'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-virtual-users/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_VirtualUser',
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-virtual-users/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_VirtualUser'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    // --------------------------------------------------------------------
    // Binary content of virtual user
    // --------------------------------------------------------------------
    array( // Read
        'regex' => '#^/test-virtual-users/(?P<modelId>\d+)/design$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'download',
        'http-method' => 'GET',
        // Cache apram
        'cacheable' => false,
        'max_age' => 25000
    ),
    array( // Update
        'regex' => '#^/test-virtual-users/(?P<modelId>\d+)/design$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'updateFile',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    // ************************************************************* Scenario of Vritual User
    array( // Schema
        'regex' => '#^/test-virtual-users/(?P<parentId>\d+)/scenarios/schema$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Scenario'
        )
    ),
    array( // Create
        'regex' => '#^/test-virtual-users/(?P<parentId>\d+)/scenarios$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'create',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/test-virtual-users/(?P<parentId>\d+)/scenarios$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Scenario',
            'parentModel' => 'TMS_VirtualUser',
            'parentKey' => 'virtual_user_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-virtual-users/(?P<parentId>\d+)/scenarios/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Scenario',
            'parent' => 'TMS_VirtualUser',
            'parentKey' => 'virtual_user_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-virtual-users/(?P<parentId>\d+)/scenarios/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Scenario',
            'parent' => 'TMS_VirtualUser',
            'parentKey' => 'virtual_user_id'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Delete (list)
        'regex' => '#^/test-virtual-users/(?P<parentId>\d+)/scenarios$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'clearManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Scenario',
            'parent' => 'TMS_VirtualUser',
            'parentKey' => 'virtual_user_id'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-virtual-users/(?P<parentId>\d+)/scenarios/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Scenario',
            'parent' => 'TMS_VirtualUser',
            'parentKey' => 'virtual_user_id'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
);