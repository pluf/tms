<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-runs/schema$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRun'
        )
    ),
    // ************************************************************* Run
    array( // Read (list)
        'regex' => '#^/test-runs$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRun'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Create
        'regex' => '#^/test-runs$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'create',
        'http-method' => 'POST',
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete list
        'regex' => '#^/test-runs$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'deleteObjects',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestRun'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-runs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRun'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-runs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestRun',
            'permanently' => true
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-runs/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestRun'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    // --------------------------------------------------------------------
    // Binary content of virtual user
    // --------------------------------------------------------------------
    array( // Read
        'regex' => '#^/test-runs/(?P<modelId>\d+)/content$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'download',
        'http-method' => 'GET',
        // Cache apram
        'cacheable' => false,
        'max_age' => 25000
    ),
    array( // Update
        'regex' => '#^/test-runs/(?P<modelId>\d+)/content$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'updateFile',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
);