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
class TMS_Views_ActivityStep extends Pluf_Views
{

    /**
     * Create an activity-step
     *
     * @param Pluf_HTTP $request
     * @param array $match
     * @param array $p
     * @return TMS_ActivityStep
     */
    public function createStep($request, $match, $p)
    {
        $model = new TMS_ActivityStep();
        $model->_a['cols']['activity_id']['editable'] = true;
        $p['model'] = $model;
        return parent::createObject($request, $match, $p);
    }
}