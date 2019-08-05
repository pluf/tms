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
    )
);
