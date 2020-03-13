<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/activity-outputs/schema$#',
        'model' => 'TMS_Views_ActivityOutput',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityOutput'
        )
    ),
    // ************************************************************* ActivityOutput
    array( // Create
        'regex' => '#^/activity-outputs$#',
        'model' => 'TMS_Views_ActivityOutput',
        'method' => 'createOutput',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityOutput'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/activity-outputs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityOutput',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityOutput'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/activity-outputs$#',
        'model' => 'TMS_Views_ActivityOutput',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityOutput'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Update
        'regex' => '#^/activity-outputs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityOutput',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityOutput'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Delete (list)
        'regex' => '#^/activity-outputs$#',
        'model' => 'TMS_Views_ActivityOutput',
        'method' => 'deleteObjects',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_ActivityOutput'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/activity-outputs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityOutput',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_ActivityOutput',
            // TODO: maso, 2019: we need workflow to support delete
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    )
);