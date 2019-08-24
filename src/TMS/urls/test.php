<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/tests/schema$#',
        'model' => 'TMS_Views_Test',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Test'
        )
    ),
    // ************************************************************* Main list
    array( // Create
        'regex' => '#^/tests$#',
        'model' => 'TMS_Views_Test',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Test'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/tests/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Test'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/tests$#',
        'model' => 'TMS_Views_Test',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Test'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/tests/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Test',
            // TODO: maso, 2019: we need workflow to support delete
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Delete (list)
        'regex' => '#^/tests$#',
        'model' => 'TMS_Views_Test',
        'method' => 'deleteObjects',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Test'
        ),
        'precond' => array(
            'TMS_Precondition::testManagerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/tests/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Test'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    // ************************************************************* Histories
    array( // Update
        'regex' => '#^/tests/(?P<parentId>\d+)/histories$#',
        'model' => 'TMS_Views_Test',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestHistory',
            'parentModel' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    // ************************************************************* Variables
    array( // schema
        'regex' => '#^/tests/(?P<parentId>\d+)/variables/schema$#',
        'model' => 'TMS_Views_Test',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestVariable'
        )
    ),
    array( // get list
        'regex' => '#^/tests/(?P<parentId>\d+)/variables$#',
        'model' => 'TMS_Views_Test',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestVariable',
            'parentModel' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // create
        'regex' => '#^/tests/(?P<parentId>\d+)/variables$#',
        'model' => 'TMS_Views_Test',
        'method' => 'createManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestVariable',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete
        'regex' => '#^/tests/(?P<parentId>\d+)/variables$#',
        'model' => 'TMS_Views_Test',
        'method' => 'clearManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestVariable',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),

    array( // read
        'regex' => '#^/tests/(?P<parentId>\d+)/variables/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestVariable',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // update
        'regex' => '#^/tests/(?P<parentId>\d+)/variables/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestVariable',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete
        'regex' => '#^/tests/(?P<parentId>\d+)/variables/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestVariable',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    // ************************************************************* Risk
    array( // schema
        'regex' => '#^/tests/(?P<parentId>\d+)/risks/schema$#',
        'model' => 'TMS_Views_Test',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRisk'
        )
    ),
    array( // get list
        'regex' => '#^/tests/(?P<parentId>\d+)/risks$#',
        'model' => 'TMS_Views_Test',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRisk',
            'parentModel' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // create
        'regex' => '#^/tests/(?P<parentId>\d+)/risks$#',
        'model' => 'TMS_Views_Test',
        'method' => 'createManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestRisk',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete
        'regex' => '#^/tests/(?P<parentId>\d+)/risks$#',
        'model' => 'TMS_Views_Test',
        'method' => 'clearManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestRisk',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),

    array( // read
        'regex' => '#^/tests/(?P<parentId>\d+)/risks/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestRisk',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // update
        'regex' => '#^/tests/(?P<parentId>\d+)/risks/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestRisk',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete
        'regex' => '#^/tests/(?P<parentId>\d+)/risks/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestRisk',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    // ************************************************************* Activities of Test
    array( // schema
        'regex' => '#^/tests/(?P<parentId>\d+)/activities/schema$#',
        'model' => 'TMS_Views_Test',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Activity'
        )
    ),
    array( // get list
        'regex' => '#^/tests/(?P<parentId>\d+)/activities$#',
        'model' => 'TMS_Views_Test',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Activity',
            'parentModel' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // create
        'regex' => '#^/tests/(?P<parentId>\d+)/activities$#',
        'model' => 'TMS_Views_Test',
        'method' => 'createManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Activity',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete
        'regex' => '#^/tests/(?P<parentId>\d+)/activities$#',
        'model' => 'TMS_Views_Test',
        'method' => 'clearManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Activity',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    
    array( // read
        'regex' => '#^/tests/(?P<parentId>\d+)/activities/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Activity',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // update
        'regex' => '#^/tests/(?P<parentId>\d+)/activities/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Activity',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete
        'regex' => '#^/tests/(?P<parentId>\d+)/activities/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Activity',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    // ************************************************************* Members of Test
    array( // Read (List)
        'regex' => '#^/tests/(?P<parentId>\d+)/members$#',
        'model' => 'TMS_Views_Test',
        'method' => 'members',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Add member
        'regex' => '#^/tests/(?P<parentId>\d+)/members$#',
        'model' => 'TMS_Views_Test',
        'method' => 'addMember',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Add member
        'regex' => '#^/tests/(?P<parentId>\d+)/members/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'addMember',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Delete member
        'regex' => '#^/tests/(?P<parentId>\d+)/members/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'removeMember',
        'http-method' => 'DELETE',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    // ************************************************************* Requirements of Test
    array( // Read (List)
        'regex' => '#^/tests/(?P<parentId>\d+)/requirements$#',
        'model' => 'TMS_Views_Test',
        'method' => 'requirements',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Add activity
        'regex' => '#^/tests/(?P<parentId>\d+)/requirements$#',
        'model' => 'TMS_Views_Test',
        'method' => 'addRequirement',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Add activity
        'regex' => '#^/tests/(?P<parentId>\d+)/requirements/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'addRequirement',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Delete activity
        'regex' => '#^/tests/(?P<parentId>\d+)/requirements/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Test',
        'method' => 'removeRequirement',
        'http-method' => 'DELETE',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    // ************************************************************* Acceptance Creiteria of Test
    array( // Schema
        'regex' => '#^/tests/(?P<parentId>\d+)/acceptance-criteria/schema$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion'
        )
    ),
    array( // Create
        'regex' => '#^/tests/(?P<parentId>\d+)/acceptance-criteria$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'createManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/tests/(?P<parentId>\d+)/acceptance-criteria$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion',
            'parentModel' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read
        'regex' => '#^/tests/(?P<parentId>\d+)/acceptance-criteria/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Update
        'regex' => '#^/tests/(?P<parentId>\d+)/acceptance-criteria/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete (list)
        'regex' => '#^/tests/(?P<parentId>\d+)/acceptance-criteria$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'clearManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/tests/(?P<parentId>\d+)/acceptance-criteria/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_TestAcceptanceCriterion',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_TestAcceptanceCriterion',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    // ************************************************************* Virtual User of Test
    array( // Schema
        'regex' => '#^/tests/(?P<parentId>\d+)/virtual-users/schema$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_VirtualUser'
        )
    ),
    array( // Create
        'regex' => '#^/tests/(?P<parentId>\d+)/virtual-users$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'createManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_VirtualUser',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/tests/(?P<parentId>\d+)/virtual-users$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_VirtualUser',
            'parentModel' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read
        'regex' => '#^/tests/(?P<parentId>\d+)/virtual-users/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_VirtualUser',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Update
        'regex' => '#^/tests/(?P<parentId>\d+)/virtual-users/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_VirtualUser',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete (list)
        'regex' => '#^/tests/(?P<parentId>\d+)/virtual-users$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'clearManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_VirtualUser',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/tests/(?P<parentId>\d+)/virtual-users/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_VirtualUser',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_VirtualUser',
            'parent' => 'TMS_Test',
            'parentKey' => 'test_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
);