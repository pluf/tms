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
namespace Pluf\Test\REST;

use Pluf\Test\Client;
use TMS_Activity;
use TMS_ActivityLog;
use User_Account;

class ActivityTest extends AbstractTest
{

    /**
     *
     * @test
     */
    public function getsSchemaOfAObject()
    {
        $client = new Client();
        $response = $client->get('/tms/activities/schema');
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
        $client = new Client();
        $response = $client->get('/tms/activities');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function gettingListOfActivitiesTest()
    {
        $client = new Client();
        // 1- Login
        $response = $client->post('/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $response = $client->get('/tms/activities');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function gettingListOfActivitiesByGraphQLTest()
    {
        $client = new Client();
        // 1- Login
        $response = $client->post('/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $response = $client->get('/tms/activities', array(
            'graphql' => '{items{id,project{id},test{id}}}'
        ));
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function createAnActivityByAdminTest()
    {
        $client = new Client();
        // 1- Login
        $response = $client->post('/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $data = array(
            'title' => 'test' . rand(),
            'description' => 'description',
            'project_id' => self::$TEST_TEST->project_id,
            'test_id' => self::$TEST_TEST->id
        );
        $response = $client->post('/tms/activities', $data);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function deleteAnActivityByAdminTest()
    {
        $client = new Client();
        // 1- Login
        $response = $client->post('/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $data = array(
            'title' => 'test' . rand(),
            'description' => 'description',
            'project_id' => self::$TEST_TEST->project_id,
            'test_id' => self::$TEST_TEST->id
        );
        $response = $client->post('/tms/activities', $data);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        // TODO: maso, 2019: getting object value with json path
        // Test_Util::getObjectValue($response, 'id');
        $actual = json_decode($response->content, true);
        $id = $actual['id'];

        $response = $client->post('/tms/activities/' . $id, array(
            'graphql' => '{id,project{id},test{id},test_id, project_id}'
        ));
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        $response = $client->delete('/tms/activities/' . $id);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        $test = new TMS_Activity();
        $test = $test->getOne('id=' . $id);
        $this->assertNull($test);
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

        $client = new Client();
        $response = $client->get('/tms/activities/' . $activity->id . '/logs');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function gettingListOfLogsOfActivityByAdmin()
    {
        $client = new Client();
        // 1- Login
        $response = $client->post('/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

        // create activity
        $activity = new TMS_Activity();
        $activity->title = 'activity' . rand();
        $activity->description = 'This is an activity';
        $activity->project_id = self::$PROJECT_TEST;
        $activity->test_id = self::$TEST_TEST;
        $activity->create();

        // getting list of logs
        $response = $client->get('/tms/activities/' . $activity->id . '/logs');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function gettingListOfLogsOfActivityByGraphQLTest()
    {
        $client = new Client();
        // Login
        $response = $client->post('/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

        // create activity
        $activity = new TMS_Activity();
        $activity->title = 'activity' . rand();
        $activity->description = 'This is an activity';
        $activity->project_id = self::$PROJECT_TEST;
        $activity->test_id = self::$TEST_TEST;
        $activity->create();

        // getting list of logs
        $response = $client->get('/tms/activities/' . $activity->id . '/logs', array(
            'graphql' => '{items{id,duration,project{id},project_id,test{id},test_id,writer{id},writer_id}}'
        ));
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function createLogOnActivityByAdminTest()
    {
        $client = new Client();
        // Login
        $response = $client->post('/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

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
        $response = $client->post('/tms/activities/' . $activity->id . '/logs', $data);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
        $actual = json_decode($response->content, true);
        $this->assertEquals($actual['activity_id'], $activity->id);
        $this->assertEquals($actual['writer_id'], User_Account::getUser(self::ADMIN_LOGIN)->id);
        $this->assertEquals($actual['project_id'], $activity->project_id);
        $this->assertEquals($actual['test_id'], $activity->test_id);
    }

    /**
     *
     * @test
     */
    public function deleteLogOfActivityByAdminTest()
    {
        $client = new Client();
        // Login
        $response = $client->post('/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

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
        $response = $client->post('/tms/activities/' . $activity->id . '/logs', $data);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        // TODO: maso, 2019: getting object value with json path
        // Test_Util::getObjectValue($response, 'id');
        $actual = json_decode($response->content, true);
        $id = $actual['id'];

        $response = $client->delete('/tms/activities/' . $activity->id . '/logs/' . $id);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        $test = new TMS_ActivityLog();
        $test = $test->getOne('id=' . $id);
        $this->assertNull($test);
    }
}

