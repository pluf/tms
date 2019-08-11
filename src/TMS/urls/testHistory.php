<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-histories/schema$#',
        'model' => 'TMS_Views_TestHistory',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestHistory'
        )
    ),
    // ************************************************************* Category
    array( // Read
        'regex' => '#^/test-histories/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestHistory',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestHistory'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/test-histories$#',
        'model' => 'TMS_Views_TestHistory',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestHistory'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
);