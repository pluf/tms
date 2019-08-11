<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-activities/schema$#',
        'model' => 'TMS_Views_Test',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Activity'
        )
    ),
    // ************************************************************* Category
    array( // Create
        'regex' => '#^/test-activities$#',
        'model' => 'TMS_Views_Test',
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
        'model' => 'TMS_Views_Test',
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
        'model' => 'TMS_Views_Test',
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
        'model' => 'TMS_Views_Test',
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
        'model' => 'TMS_Views_Test',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Activity'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),

    // ************************************************************* comments
    array( // schema
        'regex' => '#^/activities/(?P<modelId>\d+)/comments/schema$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityComment'
        )
    ),
    array( // list
        'regex' => '#^/activities/(?P<parentId>\d+)/comments$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityComment',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // create
        'regex' => '#^/activities/(?P<parentId>\d+)/comments$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'createComment',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityComment',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),



    array( // read
        'regex' => '#^/activities/(?P<parentId>\d+)/comments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityComment',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // update
        'regex' => '#^/activities/(?P<parentId>\d+)/comments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'updateComment',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityComment',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete
        'regex' => '#^/activities/(?P<parentId>\d+)/comments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'updateComment',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_ActivityComment',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
);