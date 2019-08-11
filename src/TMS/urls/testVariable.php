<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-variables/schema$#',
        'model' => 'TMS_Views_TestVariable',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestVariable'
        )
    ),
    // ************************************************************* Category
    array( // Read (list)
        'regex' => '#^/test-variables$#',
        'model' => 'TMS_Views_TestVariable',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestVariable'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Create
        'regex' => '#^/test-variables$#',
        'model' => 'TMS_Views_TestVariable',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestVariable'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete list
        'regex' => '#^/test-variables$#',
        'model' => 'TMS_Views_TestVariable',
        'method' => 'deleteObjects',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestVariable'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-variables/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestVariable',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestVariable'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-variables/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestVariable',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestVariable',
            'permanently' => true
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-variables/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestVariable',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestVariable'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    )
);