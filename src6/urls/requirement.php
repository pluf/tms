<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/requirements/schema$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Requirement'
        )
    ),
    // ************************************************************* Requirements
    array( // Create
        'regex' => '#^/requirements$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Requirement'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/requirements/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Requirement'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/requirements$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Requirement'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/requirements/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Requirement',
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Delete (list)
        'regex' => '#^/requirements$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'deleteObjects',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Requirement'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/requirements/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Requirement'
        ),
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    // ************************************************************* Test of Requirement
    array( // Read (List)
        'regex' => '#^/requirements/(?P<parentId>\d+)/tests$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'tests',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Add test
        'regex' => '#^/requirements/(?P<parentId>\d+)/tests$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'addTest',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Add test
        'regex' => '#^/requirements/(?P<parentId>\d+)/tests/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'addTest',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
    array( // Delete test
        'regex' => '#^/requirements/(?P<parentId>\d+)/tests/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'removeTest',
        'http-method' => 'DELETE',
        'precond' => array(
            'TMS_Precondition::testerRequired'
        )
    ),
);