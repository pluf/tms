<?php
return array(
    // ************************************************************* Schema
    array(
        'regex' => '#^/projects/schema$#',
        'model' => 'TMS_Views_Project',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Project'
        )
    ),
    // ************************************************************* Project
    array( // Create
        'regex' => '#^/projects$#',
        'model' => 'TMS_Views_Project',
        'method' => 'createObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Project'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Read
        'regex' => '#^/projects/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'getObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Project'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Read (list)
        'regex' => '#^/projects$#',
        'model' => 'TMS_Views_Project',
        'method' => 'findObject',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Project'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Delete
        'regex' => '#^/projects/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Project',
            // TODO: maso, 2019: we need workflow to support delete
            'permanently' => true
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Update
        'regex' => '#^/projects/(?P<modelId>\d+)$#',
        'model' => 'Pluf_Views',
        'method' => 'updateObject',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Project'
        ),
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    // ************************************************************* Members of Project

    array( // Read (List)
        'regex' => '#^/projects/(?P<parentId>\d+)/members$#',
        'model' => 'TMS_Views_Project',
        'method' => 'members',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Add member
        'regex' => '#^/projects/(?P<parentId>\d+)/members$#',
        'model' => 'TMS_Views_Project',
        'method' => 'addMember',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Add member
        'regex' => '#^/projects/(?P<parentId>\d+)/members/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'addMember',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Delete member
        'regex' => '#^/projects/(?P<parentId>\d+)/members/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'removeMember',
        'http-method' => 'DELETE',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),

    // ************************************************************* Requirements of Project
    array( // schema
        'regex' => '#^/projects/(?P<parentId>\d+)/requirements/schema$#',
        'model' => 'TMS_Views_Project',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Requirement'
        )
    ),
    array( // get list
        'regex' => '#^/projects/(?P<parentId>\d+)/requirements$#',
        'model' => 'TMS_Views_Project',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Requirement',
            'parentModel' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // create
        'regex' => '#^/projects/(?P<parentId>\d+)/requirements$#',
        'model' => 'TMS_Views_Project',
        'method' => 'createManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Requirement',
            'parent' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete
        'regex' => '#^/projects/(?P<parentId>\d+)/requirements$#',
        'model' => 'TMS_Views_Project',
        'method' => 'clearManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Requirement',
            'parent' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),

    array( // read
        'regex' => '#^/projects/(?P<parentId>\d+)/requirements/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Requirement',
            'parent' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // update
        'regex' => '#^/projects/(?P<parentId>\d+)/requirements/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Requirement',
            'parent' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // delete
        'regex' => '#^/projects/(?P<parentId>\d+)/requirements/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Requirement',
            'parent' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    // ************************************************************* Tests of Project
    array( // schema
        'regex' => '#^/projects/(?P<parentId>\d+)/tests/schema$#',
        'model' => 'TMS_Views_Project',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Requirement'
        )
    ),
    array( // get list
        'regex' => '#^/projects/(?P<parentId>\d+)/tests$#',
        'model' => 'TMS_Views_Project',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Test',
            'parentModel' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // create
        'regex' => '#^/projects/(?P<parentId>\d+)/tests$#',
        'model' => 'TMS_Views_Project',
        'method' => 'createManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Test',
            'parent' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'TMS_Precondition::testManagerRequired'
        )
    ),
    array( // delete
        'regex' => '#^/projects/(?P<parentId>\d+)/tests$#',
        'model' => 'TMS_Views_Project',
        'method' => 'clearManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Test',
            'parent' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'TMS_Precondition::testManagerRequired'
        )
    ),
    
    array( // read
        'regex' => '#^/projects/(?P<parentId>\d+)/tests/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'TMS_Test',
            'parent' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // update
        'regex' => '#^/projects/(?P<parentId>\d+)/tests/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'updateManyToOne',
        'http-method' => 'POST',
        'params' => array(
            'model' => 'TMS_Test',
            'parent' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'TMS_Precondition::testManagerRequired'
        )
    ),
    array( // delete
        'regex' => '#^/projects/(?P<parentId>\d+)/tests/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'deleteManyToOne',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Test',
            'parent' => 'TMS_Project',
            'parentKey' => 'project_id'
        ),
        'precond' => array(
            'TMS_Precondition::testManagerRequired'
        )
    )

);