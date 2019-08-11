<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-activities/schema$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Activity'
        )
    ),
    // ************************************************************* Activity
    array( // Create
        'regex' => '#^/test-activities$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Activity'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-activities/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Activity'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/test-activities$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Activity'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-activities/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Activity',
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-activities/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Activity'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    // ************************************************************* Logs of Activity

    array( // Create
        'regex' => '#^/activities/(?P<parentId>\d+)/logs$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'addLog',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        ),
        'params' => array(
            'model' => 'TMS_ActivityLog',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        )
    ),
    array( // Read (List)
        'regex' => '#^/activities/(?P<parentId>\d+)/logs$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::loginRequired'
        ),
        'params' => array(
            'model' => 'TMS_ActivityLog',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        )
    ),
    array( // Read
        'regex' => '#^/activities/(?P<parentId>\d+)/logs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityLog',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        )
    ),
    array( // Update
        'regex' => '#^/activities/(?P<parentId>\d+)/logs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityLog',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
            // 'precond' => function($request, $object, $parent) -> {false, true} | throw exception
        )
    ),
    array( // Delete
        'regex' => '#^/activities/(?P<parentId>\d+)/logs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        ),
        'params' => array(
            'model' => 'TMS_ActivityLog',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        )
    )
);