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
use TMS_Project;

class ProjectTest extends AbstractTest
{

    /**
     *
     * @test
     */
    public function getsSchemaOfAProject()
    {
        $client = new Client();
        $response = $client->get('/tms/projects/schema');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     * @expectedException Pluf_Exception_Unauthorized
     */
    public function gettingListOfProjectsTestWithAnonymouse()
    {
        $client = new Client();
        $response = $client->get('/tms/projects');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function gettingListOfProjectsTest()
    {
        $client = new Client();
        // 1- Login
        $response = $client->post('/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $response = $client->get('/tms/projects');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function gettingListOfProjectsByGraphQLTest()
    {
        $client = new Client();
        // 1- Login
        $response = $client->post('/user/login', array(
            'login' => self::ADMIN_LOGIN,
            'password' => self::ADMIN_PASS
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

        // 2- getting list of projects
        $response = $client->get('/tms/projects', array(
            'graphql' => '{items{id}}'
        ));
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function addingProjectByAdminTest()
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
            'title' => 'title' . rand(),
            'description' => 'This is a test project',
            'state' => 'done',
            'logo' => 'pat/to/logo'
        );
        $response = $client->post('/tms/projects', $data);

        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        // TODO: maso, 2019: check json value with $data
        // $this->assertObjectValues($response, $data);
    }

    /**
     *
     * @test
     */
    public function deleteProjectByAdminTest()
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
            'title' => 'title' . rand(),
            'description' => 'This is a test project',
            'state' => 'done',
            'logo' => 'pat/to/logo'
        );
        $response = $client->post('/tms/projects', $data);

        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        // TODO: maso, 2019: check json value with $data
        // $this->assertObjectValues($response, $data);

        // TODO: maso, 2019: getting object value with json path
        // Test_Util::getObjectValue($response, 'id');
        $actual = json_decode($response->content, true);
        $id = $actual['id'];
        $project = new TMS_Project($id);
        $this->assertNotNull($project);
        $this->assertFalse($project->isAnonymous());

        // Get the project
        $response = $client->get('/tms/projects/' . $project->id);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        // delete the project
        $response = $client->delete('/tms/projects/' . $project->id);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        $project = $project->getOne('id=' . $id);
        $this->assertNull($project);
    }

    /**
     *
     * @test
     */
    public function updateProjectByAdminTest()
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
            'title' => 'title' . rand(),
            'description' => 'This is a test project',
            'state' => 'done',
            'logo' => 'pat/to/logo'
        );
        $response = $client->post('/tms/projects', $data);

        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        // TODO: maso, 2019: check json value with $data
        // $this->assertObjectValues($response, $data);

        // TODO: maso, 2019: getting object value with json path
        // Test_Util::getObjectValue($response, 'id');
        $actual = json_decode($response->content, true);
        $id = $actual['id'];
        $project = new TMS_Project($id);
        $this->assertNotNull($project);
        $this->assertFalse($project->isAnonymous());

        // Get the project
        $data['title'] = 'test title' . rand();
        $response = $client->post('/tms/projects/' . $project->id, $data);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        // TODO: maso, 2019: check json value with $data
        // $this->assertObjectValues($response, $data);
    }
}

