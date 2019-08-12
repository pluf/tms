<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/test-acceptance-criteria/schema$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion'
        )
    ),
    // ************************************************************* Category
    array( // Create
        'regex' => '#^/test-acceptance-criteria$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/test-acceptance-criteria/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/test-acceptance-criteria$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/test-acceptance-criteria/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion',
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/test-acceptance-criteria/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    )
);