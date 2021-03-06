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

use Pluf\Test\TestCase;
use Pluf;
use TMS_Activity;
use TMS_ActivityComment;
use TMS_ActivityLog;
use TMS_ActivityOutput;
use TMS_ActivityStep;
use TMS_Project;
use TMS_Requirement;
use TMS_Scenario;
use TMS_Test;
use TMS_TestAcceptanceCriterion;
use TMS_TestAttachment;
use TMS_TestComment;
use TMS_TestHistory;
use TMS_TestRisk;
use TMS_TestRun;
use TMS_TestRunReport;
use TMS_TestRunTemplate;
use TMS_TestVariable;
use TMS_VirtualUser;

class ModelTest extends TestCase
{

    /**
     *
     * @before
     */
    public function setUpTest()
    {
        Pluf::start(__DIR__ . '/../conf/config.php');
    }

    /**
     *
     * @test
     */
    public function testClassInstance()
    {
        $c = new TMS_Project();
        $this->assertTrue(isset($c));
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

