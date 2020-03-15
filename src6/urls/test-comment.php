<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-comments/schema$#',
        'model' => 'TMS_Views_TestComment',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestComment'
        )
    ),
    // ************************************************************* Category
    array( // Create
        'regex' => '#^/test-comments$#',
        'model' => 'TMS_Views_TestComment',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestComment'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-comments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestComment',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestComment'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/test-comments$#',
        'model' => 'TMS_Views_TestComment',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestComment'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-comments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestComment',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestComment',
            // TODO: maso, 2019: we need workflow to support delete
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-comments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestComment',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestComment'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    )
);