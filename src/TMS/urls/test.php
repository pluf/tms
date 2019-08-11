<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/tests/schema$#',
        'model' => 'TMS_Views_Test',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Test'
        )
    ),
    // ************************************************************* Main list
    array( // Create
        'regex' => '#^/tests$#',
        'model' => 'TMS_Views_Test',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Test'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/tests/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Test'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/tests$#',
        'model' => 'TMS_Views_Test',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Test'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/tests/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Test',
            // TODO: maso, 2019: we need workflow to support delete
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/tests/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Test'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    // ************************************************************* Histories
    array( // Update
        'regex' => '#^/tests/(?P<parentId>\d+)/histories$#',
        'model' => 'TMS_Views_Test',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestHistory',
            'parentModel' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
);