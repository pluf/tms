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
require_once 'Pluf.php';

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/../Base/');

/**
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class REST_ActivityTest extends REST_AbstractTest
{

    private static function getApiV2()
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

    /**
     *
     * @test
     */
    public function getsSchemaOfAObject()
    {
        $client = new Test_Client(self::getApiV2());
        $response = $client->get('/api/v2/tms/activity-comments/schema');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function getsSchemaOfAObject2()
    {
        $client = new Test_Client(self::getApiV2());
        $response = $client->get('/api/v2/tms/activities/' . self::$ACTIVITY_TEST->id . '/comments/schema');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     * @expectedException Pluf_Exception_Unauthorized
     */
    public function gettingListOfActivitiesTestWithAnonymouse()
    {
        $client = new Test_Client(self::getApiV2());
        $response = $client->get('/api/v2/tms/activity-comments');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     * @expectedException Pluf_Exception_Unauthorized
     */
    public function gettingListOfActivitiesTestWithAnonymouse2()
    {
        $client = new Test_Client(self::getApiV2());
        $response = $client->get('/api/v2/tms/activities/' . self::$ACTIVITY_TEST->id . '/comments');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function gettingListOfActivitiesTest()
    {
        $client = new Test_Client(self::getApiV2());
        // 1- Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $response = $client->get('/api/v2/tms/activity-comments');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function gettingListOfActivitiesTest2()
    {
        $client = new Test_Client(self::getApiV2());
        // 1- Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $response = $client->get('/api/v2/tms/activities/' . self::$ACTIVITY_TEST->id . '/comments');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function gettingListOfActivitiesByGraphQLTest()
    {
        $client = new Test_Client(self::getApiV2());
        // 1- Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $response = $client->get('/api/v2/tms/activity-comments', array(
            'graphql' => '{items{id,activity{id},activity_id, writer{id}, writer_id}}'
        ));
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function gettingListOfActivitiesByGraphQLTest2()
    {
        $client = new Test_Client(self::getApiV2());
        // 1- Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $response = $client->get('/api/v2/tms/activities/' . self::$ACTIVITY_TEST->id . '/comments', array(
            'graphql' => '{items{id,activity{id},activity_id, writer{id}, writer_id}}'
        ));
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function createATestActivityWithAdminTest()
    {
        $client = new Test_Client(self::getApiV2());
        // 1- Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $data = array(
            'test' => 'test' . rand(),
            'mime_type' => 'text/plain',
            'activity_id' => self::$ACTIVITY_TEST->id
        );
        $response = $client->post('/api/v2/tms/activity-comments', $data);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function createATestActivityWithAdminTest2()
    {
        $client = new Test_Client(self::getApiV2());
        // 1- Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $data = array(
            'test' => 'test' . rand(),
            'mime_type' => 'text/plain'
        );
        $response = $client->post('/api/v2/tms/activities/' . self::$ACTIVITY_TEST->id . '/comments', $data);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function deleteATestWithAdminTest()
    {
        $client = new Test_Client(self::getApiV2());
        // 1- Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $data = array(
            'text' => 'test' . rand(),
            'mime_type' => 'text_plain',
            'activity_id' => self::$ACTIVITY_TEST->id
        );
        $response = $client->post('/api/v2/tms/activity-comments', $data);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);

        // TODO: maso, 2019: getting object value with json path
        // Test_Util::getObjectValue($response, 'id');
        $actual = json_decode($response->content, true);
        $id = $actual['id'];

        $response = $client->post('/api/v2/tms/activity-comments/' . $id, array(
            'graphql' => '{id,activity{id},activity_id, writer{id},writer_id}'
        ));
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);

        $response = $client->delete('/api/v2/tms/activity-comments/' . $id);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);

        $test = new TMS_Activity();
        $test = $test->getOne('id=' . $id);
        Test_Assert::assertNull($test);
    }

    /**
     *
     * @test
     */
    public function deleteATestWithAdminTest2()
    {
        $client = new Test_Client(self::getApiV2());
        // 1- Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $data = array(
            'text' => 'test' . rand(),
            'mime_type' => 'text_plain',
            'activity_id' => self::$ACTIVITY_TEST->id
        );
        $response = $client->post('/api/v2/tms/activities/' . self::$ACTIVITY_TEST->id . '/comments', $data);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);

        // TODO: maso, 2019: getting object value with json path
        // Test_Util::getObjectValue($response, 'id');
        $actual = json_decode($response->content, true);
        $id = $actual['id'];

        $response = $client->post('/api/v2/tms/activities/' . self::$ACTIVITY_TEST->id . '/comments/' . $id, array(
            'graphql' => '{id,activity{id},activity_id, writer{id},writer_id}'
        ));
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);

        $response = $client->delete('/api/v2/tms/activities/' . self::$ACTIVITY_TEST->id . '/comments/' . $id);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);

        $test = new TMS_Activity();
        $test = $test->getOne('id=' . $id);
        Test_Assert::assertNull($test);
    }
}

