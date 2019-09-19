<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-run-reports/schema$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRunReport'
        )
    ),
    // ************************************************************* RunReport
    array( // Create
        'regex' => '#^/test-run-reports$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'create',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-run-reports/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRunReport'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/test-run-reports$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRunReport'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-run-reports/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestRunReport',
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-run-reports/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestRunReport'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    // --------------------------------------------------------------------
    // Binary content of virtual user
    // --------------------------------------------------------------------
    array( // Read
        'regex' => '#^/test-run-reports/(?P<modelId>\d+)/content$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'download',
        'http-method' => 'GET',
        // Cache apram
        'cacheable' => false,
        'max_age' => 25000
    ),
    array( // Update
        'regex' => '#^/test-run-reports/(?P<modelId>\d+)/content$#',
        'model' => 'TMS_Views_TestRunReport',
        'method' => 'updateFile',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    )
);