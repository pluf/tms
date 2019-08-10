<?php
// /*
//  * This file is part of Pluf Framework, a simple PHP Application Framework.
//  * Copyright (C) 2010-2020 Phoinex Scholars Co. (http://dpq.co.ir)
//  *
//  * This program is free software: you can redistribute it and/or modify
//  * it under the terms of the GNU General Public License as published by
//  * the Free Software Foundation, either version 3 of the License, or
//  * (at your option) any later version.
//  *
//  * This program is distributed in the hope that it will be useful,
//  * but WITHOUT ANY WARRANTY; without even the implied warranty of
//  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
//  * GNU General Public License for more details.
//  *
//  * You should have received a copy of the GNU General Public License
//  * along with this program. If not, see <http://www.gnu.org/licenses/>.
//  */
// require_once 'Pluf.php';

// set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/../Base/');

// /**
//  *
//  * @backupGlobals disabled
//  * @backupStaticAttributes disabled
//  */
// class REST_ProjectTest extends REST_AbstractTest
// {

//     private static function getApiV2()
//     {
//         $myAPI = array(
//             array(
//                 'app' => 'Tenant',
//                 'regex' => '#^/api/v2/tms#',
//                 'base' => '',
//                 'sub' => include 'TMS/urls.php'
//             ),
//             array(
//                 'app' => 'User',
//                 'regex' => '#^/api/v2/user#',
//                 'base' => '',
//                 'sub' => include 'User/urls-v2.php'
//             )
//         );
//         return $myAPI;
//     }

//     /**
//      *
//      * @test
//      */
//     public function getsSchemaOfAProject()
//     {
//         $client = new Test_Client(self::getApiV2());
//         $response = $client->get('/api/v2/tms/projects/schema');
//         $this->assertNotNull($response);
//         $this->assertEquals($response->status_code, 200);
//     }

//     /**
//      *
//      * @test
//      * @expectedException Pluf_Exception_Unauthorized
//      */
//     public function gettingListOfProjectsTestWithAnonymouse()
//     {
//         $client = new Test_Client(self::getApiV2());
//         $response = $client->get('/api/v2/tms/projects');
//         $this->assertNotNull($response);
//         $this->assertEquals($response->status_code, 200);
//     }

//     /**
//      *
//      * @test
//      */
//     public function gettingListOfProjectsTest()
//     {
//         $client = new Test_Client(self::getApiV2());
//         // 1- Login
//         $response = $client->post('/api/v2/user/login', array(
//             'login' => self::ADMIN_LOGIN,
//             'password' => self::ADMIN_PASS
//         ));
//         Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

//         // 2- getting list of projects
//         $response = $client->get('/api/v2/tms/projects');
//         $this->assertNotNull($response);
//         $this->assertEquals($response->status_code, 200);
//     }

//     /**
//      *
//      * @test
//      */
//     public function gettingListOfProjectsByGraphQLTest()
//     {
//         $client = new Test_Client(self::getApiV2());
//         // 1- Login
//         $response = $client->post('/api/v2/user/login', array(
//             'login' => self::ADMIN_LOGIN,
//             'password' => self::ADMIN_PASS
//         ));
//         Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

//         // 2- getting list of projects
//         $response = $client->get('/api/v2/tms/projects', array(
//             'graphql' => '{items{id}}'
//         ));
//         Test_Assert::assertNotNull($response);
//         Test_Assert::assertEquals($response->status_code, 200);
//     }

//     /**
//      *
//      * @test
//      */
//     public function addingProjectByAdminTest()
//     {
//         $client = new Test_Client(self::getApiV2());
//         // 1- Login
//         $response = $client->post('/api/v2/user/login', array(
//             'login' => self::ADMIN_LOGIN,
//             'password' => self::ADMIN_PASS
//         ));
//         Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

//         // 2- getting list of projects
//         $data = array(
//             'title' => 'title' . rand(),
//             'description' => 'This is a test project',
//             'state' => 'done',
//             'logo' => 'pat/to/logo'
//         );
//         $response = $client->post('/api/v2/tms/projects', $data);

//         Test_Assert::assertNotNull($response);
//         Test_Assert::assertEquals($response->status_code, 200);

//         // TODO: maso, 2019: check json value with $data
//         // Test_Assert::assertObjectValues($response, $data);
//     }

//     /**
//      *
//      * @test
//      */
//     public function deleteProjectByAdminTest()
//     {
//         $client = new Test_Client(self::getApiV2());
//         // 1- Login
//         $response = $client->post('/api/v2/user/login', array(
//             'login' => self::ADMIN_LOGIN,
//             'password' => self::ADMIN_PASS
//         ));
//         Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

//         // 2- getting list of projects
//         $data = array(
//             'title' => 'title' . rand(),
//             'description' => 'This is a test project',
//             'state' => 'done',
//             'logo' => 'pat/to/logo'
//         );
//         $response = $client->post('/api/v2/tms/projects', $data);

//         Test_Assert::assertNotNull($response);
//         Test_Assert::assertEquals($response->status_code, 200);

//         // TODO: maso, 2019: check json value with $data
//         // Test_Assert::assertObjectValues($response, $data);

//         // TODO: maso, 2019: getting object value with json path
//         // Test_Util::getObjectValue($response, 'id');
//         $actual = json_decode($response->content, true);
//         $id = $actual['id'];
//         $project = new TMS_Project($id);
//         Test_Assert::assertNotNull($project);
//         Test_Assert::assertFalse($project->isAnonymous());

//         // Get the project
//         $response = $client->get('/api/v2/tms/projects/' . $project->id);
//         Test_Assert::assertNotNull($response);
//         Test_Assert::assertEquals($response->status_code, 200);

//         // delete the project
//         $response = $client->delete('/api/v2/tms/projects/' . $project->id);
//         Test_Assert::assertNotNull($response);
//         Test_Assert::assertEquals($response->status_code, 200);

//         $project = $project->getOne('id=' . $id);
//         Test_Assert::assertNull($project);
//     }

//     /**
//      *
//      * @test
//      */
//     public function updateProjectByAdminTest()
//     {
//         $client = new Test_Client(self::getApiV2());
//         // 1- Login
//         $response = $client->post('/api/v2/user/login', array(
//             'login' => self::ADMIN_LOGIN,
//             'password' => self::ADMIN_PASS
//         ));
//         Test_Assert::assertResponseStatusCode($response, 200, 'Fail to login');

//         // 2- getting list of projects
//         $data = array(
//             'title' => 'title' . rand(),
//             'description' => 'This is a test project',
//             'state' => 'done',
//             'logo' => 'pat/to/logo'
//         );
//         $response = $client->post('/api/v2/tms/projects', $data);

//         Test_Assert::assertNotNull($response);
//         Test_Assert::assertEquals($response->status_code, 200);

//         // TODO: maso, 2019: check json value with $data
//         // Test_Assert::assertObjectValues($response, $data);

//         // TODO: maso, 2019: getting object value with json path
//         // Test_Util::getObjectValue($response, 'id');
//         $actual = json_decode($response->content, true);
//         $id = $actual['id'];
//         $project = new TMS_Project($id);
//         Test_Assert::assertNotNull($project);
//         Test_Assert::assertFalse($project->isAnonymous());

//         // Get the project
//         $data['title'] = 'test title' . rand();
//         $response = $client->post('/api/v2/tms/projects/' . $project->id, $data);
//         Test_Assert::assertNotNull($response);
//         Test_Assert::assertEquals($response->status_code, 200);

//         // TODO: maso, 2019: check json value with $data
//         // Test_Assert::assertObjectValues($response, $data);
//     }
// }

