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
namespace Pluf\Test\RestTest;

use Pluf\Test\Basic\AbstractDirectTest;

class DirectCrudTest extends AbstractDirectTest
{

    public function getModelName()
    {
        return 'TMS_Test';
    }

    public function getBaseUrl()
    {
        return '/tms/tests';
    }

    public function getObjectGrapql()
    {
        return '{id,project{id},project_id,responsible{id},responsible_id}';
    }

    public function createRandomItemData()
    {
        return array(
            'title' => 'title',
            'description' => 'description',
            'type' => 'functional',
            'project_id' => self::$PROJECT_TEST->id
        );
    }
}

