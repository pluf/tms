<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-run-templates/schema$#',
        'model' => 'TMS_Views_TestRunTemplate',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRunTemplate'
        )
    ),
    // ************************************************************* Run Report Template
    array( // Create
        'regex' => '#^/test-run-templates$#',
        'model' => 'TMS_Views_TestRunTemplate',
        'method' => 'create',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-run-templates/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRunTemplate',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRunTemplate'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/test-run-templates$#',
        'model' => 'TMS_Views_TestRunTemplate',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRunTemplate'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-run-templates/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRunTemplate',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestRunTemplate',
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-run-templates/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRunTemplate',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestRunTemplate'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    // --------------------------------------------------------------------
    // Binary content of virtual user
    // --------------------------------------------------------------------
    array( // Read
        'regex' => '#^/test-run-templates/(?P<modelId>\d+)/content$#',
        'model' => 'TMS_Views_TestRunTemplate',
        'method' => 'download',
        'http-method' => 'GET',
        // Cache apram
        'cacheable' => false,
        'max_age' => 25000
    ),
    array( // Update
        'regex' => '#^/test-run-templates/(?P<modelId>\d+)/content$#',
        'model' => 'TMS_Views_TestRunTemplate',
        'method' => 'updateFile',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    )
);