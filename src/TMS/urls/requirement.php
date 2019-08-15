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
    // *************************************************************
    array( // Create
        'regex' => '#^/requirements$#',
        'model' => 'TMS_Views_Requirement',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Requirement'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
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
            'TMS_Precondition::projectManagerRequired'
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
            'User_Precondition::loginRequired'
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
            'TMS_Precondition::projectManagerRequired'
        )
    ),
);