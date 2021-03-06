<?php
/*
 * This file is part of Pluf Framework, a simple PHP Application Framework.
 * Copyright (C) 2010-2020 Phoinex Scholars Co. (http://dpq.co.ir)
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
namespace Pluf\Test\RestActivityOutput;

use Pluf\Test\Basic\AbstractDirectTest;

class FromActivityCrudTest extends AbstractDirectTest
{

    public function getModelName()
    {
        return 'TMS_TestRisk';
        // return '\pluf\tms\TestRisk';
    }

    public function createApiV2()
    {
        $myAPI = array(
            array(
                'app' => 'Tenant',
                'regex' => '#^/tms#',
                'base' => '',
                'sub' => include 'TMS/urls.php'
            ),
            array(
                'app' => 'User',
                'regex' => '#^/user#',
                'base' => '',
                'sub' => include 'User/urls-v2.php'
            )
        );
        return $myAPI;
    }

    public function getBaseUrl()
    {
        return '/tms/activities/' . self::$ACTIVITY_TEST->id . '/outputs';
    }

    public function getObjectGrapql()
    {
        return '{id,activity{id},activity_id}';
    }

    public function createRandomItemData()
    {
        return array(
            'title' => 'activity-output' . rand(),
            'description' => 'description'
        );
    }
}

