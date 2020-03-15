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
namespace Pluf\Test\RestScenario;

use Pluf\Test\Basic\AbstractDirectTest;

class DirectCrudTest extends AbstractDirectTest
{

    static $VIRTUAL_USER_TEST = null;

    /**
     *
     * @beforeClass
     */
    public static function installApps()
    {
        parent::installApps();

        // Scenario
        $vu = new \TMS_VirtualUser();
        $vu->title = 'title' . rand();
        $vu->description = 'This is a test';
        $vu->state = 'init';
        $vu->type = 'type';
        $vu->test_id = self::$TEST_TEST;
        $vu->create();
        self::$VIRTUAL_USER_TEST = $vu;
    }

    public function getModelName()
    {
        return 'TMS_Scenario';
    }

    public function getBaseUrl()
    {
        return '/tms/scenarios';
    }

    public function getObjectGrapql()
    {
        return '{id,title,description,file_name,file_size,type,virtual_user{id}}';
    }

    public function createRandomItemData()
    {
        return array(
            'title' => 'title',
            'description' => 'description',
            'type' => 'test',
            'virtual_user_id' => self::$VIRTUAL_USER_TEST->id
        );
    }
}

