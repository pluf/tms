<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/scenarios/schema$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Scenario'
        )
    ),
    // ************************************************************* Scenario
    array( // Create
        'regex' => '#^/scenarios$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Scenario'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/scenarios/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Scenario'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/scenarios$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Scenario'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/scenarios/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Scenario',
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Delete (list)
        'regex' => '#^/scenarios$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'deleteObjects',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Scenario'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/scenarios/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Scenario',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Scenario'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    )
);