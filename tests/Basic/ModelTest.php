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

require_once 'Pluf.php';

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class Basic_ModelTest extends TestCase
{

    /**
     * @before
     */
    public function setUp ()
    {
        Pluf::start(__DIR__. '/../conf/config.php');
    }

    /**
     * @test
     */
    public function testClassInstance ()
    {
        $c = new TMS_Activity();
        $this->assertTrue(isset($c));
        $c = new TMS_ActivityComment();
        $this->assertTrue(isset($c));
        $c = new TMS_ActivityLog();
        $this->assertTrue(isset($c));
        $c = new TMS_ActivityOutput();
        $this->assertTrue(isset($c));
        $c = new TMS_ActivityStep();
        $this->assertTrue(isset($c));
        $c = new TMS_Project();
        $this->assertTrue(isset($c));
        $c = new TMS_Requirement();
        $this->assertTrue(isset($c));
        $c = new TMS_Scenario();
        $this->assertTrue(isset($c));
        $c = new TMS_Test();
        $this->assertTrue(isset($c));
        $c = new TMS_TestAcceptanceCriterion();
        $this->assertTrue(isset($c));
        $c = new TMS_TestAttachment();
        $this->assertTrue(isset($c));
        $c = new TMS_TestComment();
        $this->assertTrue(isset($c));
        $c = new TMS_TestHistory();
        $this->assertTrue(isset($c));
        $c = new TMS_TestRisk();
        $this->assertTrue(isset($c));
        $c = new TMS_TestRun();
        $this->assertTrue(isset($c));
        $c = new TMS_TestRunReport();
        $this->assertTrue(isset($c));
        $c = new TMS_TestRunTemplate();
        $this->assertTrue(isset($c));
        $c = new TMS_TestVariable();
        $this->assertTrue(isset($c));
        $c = new TMS_VirtualUser();
        $this->assertTrue(isset($c));
    }
}

