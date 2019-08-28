<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/virtual-users/schema$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_VirtualUser'
        )
    ),
    // ************************************************************* Virtual-User
    array( // Create
        'regex' => '#^/virtual-users$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_VirtualUser'
        ),
        'precond' => array(
            'TMS_Precondition::loginRequired'
        )
    ),
    array( // Read
        'regex' => '#^/virtual-users/(?P<modelId>\d+)$#',
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
        'regex' => '#^/virtual-users$#',
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
        'regex' => '#^/virtual-users/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_VirtualUser',
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::loginRequired'
        )
    ),
    array( // Update
        'regex' => '#^/virtual-users/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_VirtualUser'
        ),
        'precond' => array(
            'TMS_Precondition::loginRequired'
        )
    )
);