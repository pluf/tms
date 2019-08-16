<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/activities/schema$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Activity'
        )
    ),
    // ************************************************************* Activity
    array( // Create
        'regex' => '#^/activities$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'createActivity',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Activity'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/activities/(?P<modelId>\d+)$#',
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
        'regex' => '#^/activities$#',
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
        'regex' => '#^/activities/(?P<modelId>\d+)$#',
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
        'regex' => '#^/activities/(?P<modelId>\d+)$#',
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
    // ************************************************************* Members of Activity
    
    array( // Read (List)
        'regex' => '#^/activities/(?P<parentId>\d+)/members$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'members',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Add member
        'regex' => '#^/activities/(?P<parentId>\d+)/members$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'addMember',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Add member
        'regex' => '#^/activities/(?P<parentId>\d+)/members/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'addMember',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Delete member
        'regex' => '#^/activities/(?P<parentId>\d+)/members/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'removeMember',
        'http-method' => 'DELETE',
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
    ),
    // ************************************************************* Output of Activity
    array( // schema
        'regex' => '#^/activities/(?P<modelId>\d+)/outputs/schema$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityOutput'
        )
    ),
    array( // Create
        'regex' => '#^/activities/(?P<parentId>\d+)/outputs$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'createManyToOne',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        ),
        'params' => array(
            'model' => 'TMS_ActivityOutput',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        )
    ),
    array( // Read (List)
        'regex' => '#^/activities/(?P<parentId>\d+)/outputs$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::loginRequired'
        ),
        'params' => array(
            'model' => 'TMS_ActivityOutput',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        )
    ),
    array( // Read
        'regex' => '#^/activities/(?P<parentId>\d+)/outputs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityOutput',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        )
    ),
    array( // Update
        'regex' => '#^/activities/(?P<parentId>\d+)/outputs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityOutput',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
            // 'precond' => function($request, $object, $parent) -> {false, true} | throw exception
        )
    ),
    array( // Delete
        'regex' => '#^/activities/(?P<parentId>\d+)/outputs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        ),
        'params' => array(
            'model' => 'TMS_ActivityOutput',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
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
    // ************************************************************* Step
    array( // schema
        'regex' => '#^/activities/(?P<modelId>\d+)/steps/schema$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityStep'
        )
    ),
    array( // list
        'regex' => '#^/activities/(?P<parentId>\d+)/steps$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityStep',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // create
        'regex' => '#^/activities/(?P<parentId>\d+)/steps$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'createComment',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityStep',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),



    array( // read
        'regex' => '#^/activities/(?P<parentId>\d+)/steps/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_ActivityStep',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // update
        'regex' => '#^/activities/(?P<parentId>\d+)/steps/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_ActivityStep',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete
        'regex' => '#^/activities/(?P<parentId>\d+)/steps/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Activity',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_ActivityStep',
            'parent' => 'TMS_Activity',
            'parentKey' => 'activity_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    )
);