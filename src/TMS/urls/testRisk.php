<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-risks/schema$#',
        'model' => 'TMS_Views_TestRisk',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRisk'
        )
    ),
    // ************************************************************* Category
    array( // Read (list)
        'regex' => '#^/test-risks$#',
        'model' => 'TMS_Views_TestRisk',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRisk'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Create
        'regex' => '#^/test-risks$#',
        'model' => 'TMS_Views_TestRisk',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestRisk'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete list
        'regex' => '#^/test-risks$#',
        'model' => 'TMS_Views_TestRisk',
        'method' => 'deleteObjects',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestRisk'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-risks/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRisk',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRisk'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-risks/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRisk',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestRisk',
            'permanently' => true
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-risks/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestRisk',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestRisk'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    )
);