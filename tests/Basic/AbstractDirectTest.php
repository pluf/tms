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
namespace Pluf\Test\Basic;

/**
 * It is a basic class for tests which includes common processes for unit tests.
 * It loads config and create an default tenant, a default account (with username 'test') and a default
 * credential for this account (with password 'test').
 * It also includes uninstall process after finishint tests.
 *
 */
abstract class AbstractDirectTest extends AbstractTest
{

    abstract public function getBaseUrl();

    abstract public function getObjectGrapql();

    abstract public function createRandomItemData();

    abstract public function getModelName();

    /**
     *
     * @test
     */
    public function getsSchemaOfObjectTest()
    {
        $response = $this->createClient()->get($this->getBaseUrl() . '/schema');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function getListOfItemsTest()
    {
        $client = $this->createClient();
        $this->loginWithAdmin($client);

        // 2- getting list of projects
        $response = $client->get($this->getBaseUrl());
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function getListOfItemsByGraphQlTest()
    {
        $client = $this->createClient();
        $this->loginWithAdmin($client);

        // 2- getting list of projects
        $response = $client->get($this->getBaseUrl(), array(
            'graphql' => '{items' . $this->getObjectGrapql() . '}'
        ));
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function createAnItemWitRandomDataTest()
    {
        $client = $this->createClient();
        $this->loginWithAdmin($client);

        // 2- getting list of projects
        $data = $this->createRandomItemData();
        $response = $client->post($this->getBaseUrl(), $data);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function deleteItemTest()
    {
        $client = $this->createClient();
        $this->loginWithAdmin($client);

        // 2- getting list of projects
        $data = $this->createRandomItemData();
        $response = $client->post($this->getBaseUrl(), $data);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        // TODO: maso, 2019: getting object value with json path
        // Test_Util::getObjectValue($response, 'id');
        $actual = json_decode($response->content, true);
        $id = $actual['id'];

        $response = $client->post($this->getBaseUrl() . '/' . $id, array(
            'graphql' => $this->getObjectGrapql()
        ));
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        $response = $client->delete($this->getBaseUrl() . '/' . $id);
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        $modelName = $this->getModelName();
        $test = new $modelName();
        $test = $test->getOne('id=' . $id);
        $this->assertNull($test);
    }
}


