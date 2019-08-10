<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-attachments/schema$#',
        'model' => 'TMS_Views_TestAttachment',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestAttachment'
        )
    ),
    // ************************************************************* Category
    array( // Create
        'regex' => '#^/test-attachments$#',
        'model' => 'TMS_Views_TestAttachment',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestAttachment'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-attachments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestAttachment',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestAttachment'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/test-attachments$#',
        'model' => 'TMS_Views_TestAttachment',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestAttachment'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-attachments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestAttachment',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestAttachment',
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-attachments/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestAttachment',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestAttachment'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    )
);