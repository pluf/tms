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
    )
);
