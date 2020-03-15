<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/activity-comments/schema$#',
        'model' => 'TMS_Views_ActivityComment',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityComment'
        )
    ),
    // ************************************************************* Category
    array( // Read (list)
        'regex' => '#^/activity-comments$#',
        'model' => 'TMS_Views_ActivityComment',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityComment'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Create
        'regex' => '#^/activity-comments$#',
        'model' => 'TMS_Views_ActivityComment',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityComment'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read
        'regex' => '#^/activity-comments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityComment',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityComment'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/activity-comments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityComment',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_ActivityComment',
            'permanently' => true
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Update
        'regex' => '#^/activity-comments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityComment',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityComment'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),

);