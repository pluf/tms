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
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\IncompleteTestError;
require_once 'Pluf.php';

/**
 * It is a basic class for tests which includes common processes for unit tests.
 * It loads config and create an default tenant, a default account (with username 'test') and a default
 * credential for this account (with password 'test').
 * It also includes uninstall process after finishint tests.
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
abstract class REST_AbstractTest extends TestCase
{

    /*
     * Accounts
     */
    const ADMIN_LOGIN = 'admin';

    const ADMIN_PASS = 'admin';

    static $PROJECT_TEST = null;
    static $TEST_TEST = null;

    /**
     *
     * @beforeClass
     */
    public static function installApps()
    {
        $cfg = include __DIR__ . '/../conf/config.php';
        Pluf::start($cfg);
        $m = new Pluf_Migration(Pluf::f('installed_apps'));
        $m->install();

        // CREATE ADMIN
        $user = new User_Account();
        $user->login = self::ADMIN_LOGIN;
        $user->is_active = true;
        if (true !== $user->create()) {
            throw new Exception();
        }
        // Credential of user
        $credit = new User_Credential();
        $credit->setFromFormData(array(
            'account_id' => $user->id
        ));
        $credit->setPassword(self::ADMIN_PASS);
        if (true !== $credit->create()) {
            throw new Exception();
        }
        $per = User_Role::getFromString('tenant.owner');
        $user->setAssoc($per);

        // CREATE MANAGER
        // CREATE PROJECT_MANAGER
        // CREATE TESTER

        // Project
        $project = new TMS_Project();
        $project->title = 'title' . rand();
        $project->description = 'This is a test project';
        $project->create();
        self::$PROJECT_TEST = $project;

        // TEST
        $test = new TMS_Test();
        $test->title = 'title' . rand();
        $test->description = 'This is a test';
        $test->project_id = $project;
        $test->create();
        self::$TEST_TEST = $test;
    }

    /**
     *
     * @afterClass
     */
    public static function uninstallApps()
    {
        $m = new Pluf_Migration(Pluf::f('installed_apps'));
        $m->unInstall();
    }
}


