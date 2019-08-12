<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/activity-steps/schema$#',
        'model' => 'TMS_Views_ActivityStep',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityStep'
        )
    ),
    // ************************************************************* Category
    array( // Read (list)
        'regex' => '#^/activity-steps$#',
        'model' => 'TMS_Views_ActivityStep',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityStep'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Create
        'regex' => '#^/activity-steps$#',
        'model' => 'TMS_Views_ActivityStep',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityStep'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read
        'regex' => '#^/activity-steps/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityStep',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityStep'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/activity-steps/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityStep',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_ActivityStep',
            'permanently' => true
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Update
        'regex' => '#^/activity-steps/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityStep',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityStep'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),

);