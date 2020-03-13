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
    array( // Create
        'regex' => '#^/test-runs$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'create',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
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
    array( // delete list
        'regex' => '#^/test-runs$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'deleteObjects',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestRun'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
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
            'TMS_Precondition::testerRequired'
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
            'TMS_Precondition::testerRequired'
        )
    ),
    // --------------------------------------------------------------------
    // Binary content of Test Run 
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
    // ************************************************************* Events
    array( // Read
        'regex' => '#^/test-runs/(?P<modelId>\d+)/events$#',
        'model' => 'TMS_Views_TestRun',
        'method' => 'query',
        'http-method' => 'GET'
    ),
    // ************************************************************* Reports of TestRun
    array( // Schema
        'regex' => '#^/test-runs/(?P<parentId>\d+)/reports/schema$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRunReport'
        )
    ),
    array( // Create
        'regex' => '#^/test-runs/(?P<parentId>\d+)/reports$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'create',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/test-runs/(?P<parentId>\d+)/reports$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRunReport',
            'parentModel' => 'TMS_TestRun',
            'parentKey' => 'test_run_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-runs/(?P<parentId>\d+)/reports/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRunReport',
            'parent' => 'TMS_TestRun',
            'parentKey' => 'test_run_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-runs/(?P<parentId>\d+)/reports/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestRunReport',
            'parent' => 'TMS_TestRun',
            'parentKey' => 'test_run_id'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Delete (list)
        'regex' => '#^/test-runs/(?P<parentId>\d+)/reports$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'clearManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestRunReport',
            'parent' => 'TMS_TestRun',
            'parentKey' => 'test_run_id'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-runs/(?P<parentId>\d+)/reports/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestRunReport',
            'parent' => 'TMS_TestRun',
            'parentKey' => 'test_run_id'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
);