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
        $response = $client->get('/api/v2/tms/activities/schema');
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
        $response = $client->get('/api/v2/tms/activities');
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
        $response = $client->get('/api/v2/tms/activities');
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
        $response = $client->get('/api/v2/tms/activities', array(
            'graphql' => '{items{id,project{id},test{id}}}'
        ));
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function createAnActivityByAdminTest()
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
            'title' => 'test' . rand(),
            'description' => 'description',
            'project_id' => self::$TEST_TEST->project_id,
            'test_id' => self::$TEST_TEST->id,
        );
        $response = $client->post('/api/v2/tms/activities', $data);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function deleteAnActivityByAdminTest()
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
            'title' => 'test' . rand(),
            'description' => 'description',
            'project_id' => self::$TEST_TEST->project_id,
            'test_id' => self::$TEST_TEST->id,
        );
        $response = $client->post('/api/v2/tms/activities', $data);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);

        // TODO: maso, 2019: getting object value with json path
        // Test_Util::getObjectValue($response, 'id');
        $actual = json_decode($response->content, true);
        $id = $actual['id'];


        $response = $client->post('/api/v2/tms/activities/' . $id, array(
            'graphql' => '{id,project{id},test{id},test_id, project_id}'
        ));
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);

        $response = $client->delete('/api/v2/tms/activities/' . $id);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);

        $test = new TMS_Activity();
        $test = $test->getOne('id='.$id);
        Test_Assert::assertNull($test);
    }


    /**
     *
     * @test
     * @expectedException Pluf_Exception_Unauthorized
     */
    public function gettingListOfLogsOfActivityByAnonymouse()
    {
        // create activity
        $activity = new TMS_Activity();
        $activity->title = 'activity' . rand();
        $activity->description = 'This is an activity';
        $activity->project_id = self::$PROJECT_TEST;
        $activity->test_id = self::$TEST_TEST;
        $activity->create();
        
        $client = new Test_Client(self::getApiV2());
        $response = $client->get('/api/v2/tms/activities/' . $activity->id . '/logs');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }
    
    /**
     *
     * @test
     */
    public function gettingListOfLogsOfActivityByAdmin()
    {
        $client = new Test_Client(self::getApiV2());
        // 1- Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

        // create activity
        $activity = new TMS_Activity();
        $activity->title = 'activity' . rand();
        $activity->description = 'This is an activity';
        $activity->project_id = self::$PROJECT_TEST;
        $activity->test_id = self::$TEST_TEST;
        $activity->create();
        
        // getting list of logs
        $response = $client->get('/api/v2/tms/activities/' . $activity->id . '/logs');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }
    
    /**
     *
     * @test
     */
    public function gettingListOfLogsOfActivityByGraphQLTest()
    {
        $client = new Test_Client(self::getApiV2());
        // Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');
        
        // create activity
        $activity = new TMS_Activity();
        $activity->title = 'activity' . rand();
        $activity->description = 'This is an activity';
        $activity->project_id = self::$PROJECT_TEST;
        $activity->test_id = self::$TEST_TEST;
        $activity->create();
        
        // getting list of logs
        $response = $client->get('/api/v2/tms/activities/' . $activity->id . '/logs', array(
            'graphql' => '{items{id,duration,project{id},project_id,test{id},test_id,writer{id},writer_id}}'
        ));
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);
    }
    
    /**
     *
     * @test
     */
    public function createLogOnActivityByAdminTest()
    {
        $client = new Test_Client(self::getApiV2());
        // Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');
        
        // create activity
        $activity = new TMS_Activity();
        $activity->title = 'activity' . rand();
        $activity->description = 'This is an activity';
        $activity->project_id = self::$PROJECT_TEST;
        $activity->test_id = self::$TEST_TEST;
        $activity->create();
        
        // create activity-log
        $data = array(
            'title' => 'test' . rand(),
            'description' => 'description',
            'duration' => 1.5
        );
        $response = $client->post('/api/v2/tms/activities/' . $activity->id . '/logs', $data);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);
        $actual = json_decode($response->content, true);
        Test_Assert::assertEquals($actual['activity_id'], $activity->id);
        Test_Assert::assertEquals($actual['writer_id'], User_Account::getUser(self::ADMIN_LOGIN)->id);
        Test_Assert::assertEquals($actual['project_id'], $activity->project_id);
        Test_Assert::assertEquals($actual['test_id'], $activity->test_id);
    }
    
    /**
     *
     * @test
     */
    public function deleteLogOfActivityByAdminTest()
    {
        $client = new Test_Client(self::getApiV2());
        // Login
        $response = $client->post('/api/v2/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');
        
        // create activity
        $activity = new TMS_Activity();
        $activity->title = 'activity' . rand();
        $activity->description = 'This is an activity';
        $activity->project_id = self::$PROJECT_TEST;
        $activity->test_id = self::$TEST_TEST;
        $activity->create();
        
        // create activity-log
        $data = array(
            'title' => 'test' . rand(),
            'description' => 'description',
            'duration' => 1.5
        );
        $response = $client->post('/api/v2/tms/activities/' . $activity->id . '/logs', $data);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);
        
        // TODO: maso, 2019: getting object value with json path
        // Test_Util::getObjectValue($response, 'id');
        $actual = json_decode($response->content, true);
        $id = $actual['id'];
        
        $response = $client->delete('/api/v2/tms/activities/' . $activity->id . '/logs/' . $id);
        Test_Assert::assertNotNull($response);
        Test_Assert::assertEquals($response->status_code, 200);
        
        $test = new TMS_ActivityLog();
        $test = $test->getOne('id=' . $id);
        Test_Assert::assertNull($test);
    }
    
}

