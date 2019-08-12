<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/activity-log/schema$#',
        'model' => 'TMS_Views_ActivityLog',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityLog'
        )
    ),
    // ************************************************************* ActivityLog
    array( // Create
        'regex' => '#^/activity-logs$#',
        'model' => 'TMS_Views_ActivityLog',
        'method' => 'createLog',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityLog'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/activity-logs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityLog',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityLog'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/activity-logs$#',
        'model' => 'TMS_Views_ActivityLog',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityLog'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/activity-logs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityLog',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_ActivityLog',
            // TODO: maso, 2019: we need workflow to support delete
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/activity-logs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_ActivityLog',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityLog'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    )
);