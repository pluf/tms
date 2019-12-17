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
namespace RestScenario;

use Basic_AbstractDirectTest;
require_once 'Pluf.php';

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/../Base/');

/**
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class DirectCrudTest extends Basic_AbstractDirectTest
{
    static $VIRTUAL_USER_TEST = null;

    /**
     *
     * @beforeClass
     */
    public static function installApps(){
        
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

    public function createApiV2()
    {
        $myAPI = array(
            array(
                'app' => 'Tenant',
                'regex' => '#^/api/v2/tms#',
                'base' => '',
                'sub' => include 'TMS/urls.php'
            ),
            array(
                'app' => 'User',
                'regex' => '#^/api/v2/user#',
                'base' => '',
                'sub' => include 'User/urls-v2.php'
            )
        );
        return $myAPI;
    }

    public function getBaseUrl()
    {
        return '/api/v2/tms/scenarios';
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

