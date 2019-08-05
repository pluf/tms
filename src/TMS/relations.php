<?php

/*
 * Signals
 */

// Pluf_Signal::connect('Shop_Order::stateChange',
// array(
// 'Shop_Views_Manager_Abstract',
// 'sendNotification'
// ));
// Pluf_Signal::connect('Shop_Order::stateChange',
// array(
// 'Shop_Order_Manager_Abstract',
// 'addOrderHistory'
// ));
return array(
    'TMS_Project' => array(
        'relate_to' => array(
            'User_Account'
        )
    ),
    'TMS_Test' => array(
        'relate_to' => array(
            'User_Account',
            'TMS_Project'
        ),
        'relate_to_many' => array(
            'TMS_Requirement',
            'TMS_Activity',
            'TMS_TestRisk',
            'TMS_TestVariable',
            'TMS_TestAttachment',
            'TMS_VirtualUser',
            'User_Account'
        )
    ),
    'TMS_Requirement' => array(
        'relate_to' => array(
            'TMS_Project'
        ),
        'relate_to_many' => array(
            'TMS_Test'
        )
    ),
    'TMS_TestRisk' => array(
        'relate_to' => array(
            'TMS_Test'
        )
    ),
    'TMS_TestVariable' => array(
        'relate_to' => array(
            'TMS_Test'
        )
    ),
    'TMS_TestAttachment' => array(
        'relate_to' => array(
            'TMS_Test'
        )
    ),
    'TMS_Activity' => array(
        'relate_to' => array(
            'User_Account',
            'TMS_Project',
            'TMS_Test'
        ),
        'relate_to_many' => array(
            'TMS_ActivityComment',
            'TMS_ActivityLog',
            'TMS_ActivityOutput',
            'User_Account'
        )
    ),
    'TMS_ActivityComment' => array(
        'relate_to' => array(
            'User_Account',
            'TMS_Activity'
        )
    ),
    'TMS_ActivityLog' => array(
        'relate_to' => array(
            'User_Account',
            'TMS_Project',
            'TMS_Test',
            'TMS_Activity'
        )
    ),
    'TMS_ActivityOutput' => array(
        'relate_to' => array(
            'TMS_Activity'
        )
    )
);
