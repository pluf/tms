<?php
/*
 * This file is part of Pluf Framework, a simple PHP Application Framework.
 * Copyright (C) 2010-2020 Phoinex Scholars Co. http://dpq.co.ir
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace Pluf\TMS;

use Pluf;

class Module extends \Pluf\Module
{

    const moduleJsonPath = __DIR__ . '/module.json';

    const relations = array(
        'TMS_Project' => array(
            'relate_to' => array(
                'User_Account'
            )
        ),
        'TMS_Test' => array(
            'relate_to' => array(
                'User_Account', // TODO: maso, 2019: add a member model in the package
                'TMS_Project'
            ),
            'relate_to_many' => array(
                'TMS_Requirement'
                // 'TMS_Activity',
                // 'TMS_TestRisk',
                // 'TMS_TestVariable',
                // 'TMS_TestAttachment',
                // 'TMS_VirtualUser',
                // 'User_Account'
            )
        ),
        'TMS_Requirement' => array(
            'relate_to' => array(
                'TMS_Project'
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
        // 'TMS_TestAcceptanceCriterion' => array(
        // 'relate_to' => array(
        // 'TMS_Test'
        // )
        // ),
        'TMS_TestRun' => array(
            'relate_to' => array(
                'TMS_Test'
                // 'JMS_Pipeline'
            )
        ),
        'TMS_TestRunReport' => array(
            'relate_to' => array(
                'TMS_TestRun'
            )
        ),
        'TMS_TestHistory' => array(
            'relate_to' => array(
                'User_Account',
                'TMS_Test'
            )
        ),
        'TMS_TestComment' => array(
            'relate_to' => array(
                'User_Account', // TODO: maso, 2019: replace with tms member
                'TMS_Test'
            )
        ),
        'TMS_VirtualUser' => array(
            'relate_to' => array(
                'TMS_Test'
            )
        ),
        'TMS_Scenario' => array(
            'relate_to' => array(
                'TMS_VirtualUser'
            )
        ),
        // 'TMS_Activity' => array(
        // 'relate_to' => array(
        // 'User_Account',
        // 'TMS_Project',
        // 'TMS_Test'
        // ),
        // 'relate_to_many' => array(
        // 'TMS_ActivityComment',
        // 'TMS_ActivityLog',
        // 'TMS_ActivityOutput',
        // 'User_Account'
        // )
        // ),
        'TMS_ActivityStep' => array(
            'relate_to' => array(
                'TMS_Activity'
            )
        ),
        'TMS_ActivityComment' => array(
            'relate_to' => array(
                'User_Account', // TODO: maso, 2019: replace with tms member
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

    public function init(Pluf $bootstrap): void
    {}
}

