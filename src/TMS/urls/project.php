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
    // ************************************************************* Category
    array( // Create
        'regex' => '#^/projects$#',
        'model' => 'Pluf_Views',
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
        'model' => 'Pluf_Views',
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
        'model' => 'Pluf_Views',
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
        'model' => 'Pluf_Views',
        'method' => 'deleteObject',
        'http-method' => 'DELETE',
        'params' => array(
            'model' => 'TMS_Project',
            'permanently' => false
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
    // ************************************************************* Test of Project

    array( // Read (List)
        'regex' => '#^/projects/(?P<parentlId>\d+)/members$#',
        'model' => 'TMS_Views_Project',
        'method' => 'members',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::loginRequired'
        )
    ),
    array( // Add member
        'regex' => '#^/projects/(?P<parentlId>\d+)/members$#',
        'model' => 'TMS_Views_Project',
        'method' => 'addMember',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Add member
        'regex' => '#^/projects/(?P<parentlId>\d+)/members/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'addMember',
        'http-method' => 'POST',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    ),
    array( // Delete member
        'regex' => '#^/projects/(?P<parentlId>\d+)/members/(?P<modelId>\d+)$#',
        'model' => 'TMS_Views_Project',
        'method' => 'removeMember',
        'http-method' => 'DELETE',
        'precond' => array(
            'TMS_Precondition::projectManagerRequired'
        )
    )

);