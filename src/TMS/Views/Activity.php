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
Pluf::loadFunction('Pluf_Shortcuts_GetObjectOr404');

class TMS_Views_Activity extends Pluf_Views
{

    public function createActivity($request, $match, $p)
    {
        $test = Pluf_Shortcuts_GetObjectOr404('TMS_Test', $request->REQUEST['test_id']);
        $model = new TMS_Activity();
        $model->_a['cols']['test_id']['editable'] = true;
        $model->_a['cols']['project_id']['editable'] = true;
        $p['model'] = $model;
        $request->REQUEST['test_id'] = $test->id;
        $request->REQUEST['project_id'] = $test->get_project()->id;
        $activity = $this->createObject($request, $match, $p);
        return $activity;
    }

    public function members($request, $match)
    {
        $project = Pluf_Shortcuts_GetObjectOr404('TMS_Activity', $match['parentId']);
        $user = new User_Account();
        $userTable = $user->_con->pfx . $user->_a['table'];
        Pluf::loadFunction('Pluf_Shortcuts_GetAssociationTableName');
        $assocTable = $user->_con->pfx . Pluf_Shortcuts_GetAssociationTableName('User_Account', 'TMS_Activity');
        Pluf::loadFunction('Pluf_Shortcuts_GetForeignKeyName');
        $userFk = Pluf_Shortcuts_GetForeignKeyName('User_Account');
        $user->_a['views']['myView'] = array(
            'select' => $user->getSelect(),
            'join' => 'LEFT JOIN ' . $assocTable . ' ON ' . $userTable . '.id=' . $assocTable . '.' . $userFk
        );

        $projectFk = Pluf_Shortcuts_GetForeignKeyName('TMS_Activity');
        $builder = new Pluf_Paginator_Builder($user);
        return $builder->setWhereClause(new Pluf_SQL($projectFk . '=%s', array(
            $project->id
        )))
            ->setView('myView')
            ->setRequest($request)
            ->build();
    }

    public static function addMember($request, $match)
    {
        $project = Pluf_Shortcuts_GetObjectOr404('TMS_Activity', $match['parentId']);
        if (isset($match['modelId'])) {
            $userId = $match['modelId'];
        } else {
            $userId = isset($request->REQUEST['id']) ? $request->REQUEST['id'] : $request->REQUEST['modelId'];
        }
        $user = Pluf_Shortcuts_GetObjectOr404('User_Account', $userId);
        $project->setAssoc($user);
        return $user;
    }

    public static function removeMember($request, $match)
    {
        $project = Pluf_Shortcuts_GetObjectOr404('TMS_Activity', $match['parentId']);
        if (isset($match['modelId'])) {
            $userId = $match['modelId'];
        } else {
            $userId = isset($request->REQUEST['id']) ? $request->REQUEST['id'] : $request->REQUEST['modelId'];
        }
        $user = Pluf_Shortcuts_GetObjectOr404('User_Account', $userId);
        $project->delAssoc($user);
        return $user;
    }

    public function addLog($request, $match, $p)
    {
        $activity = Pluf_Shortcuts_GetObjectOr404('TMS_Activity', $match['parentId']);
        $test = $activity->get_test();
        $model = new TMS_ActivityLog();
        $model->_a['cols']['writer_id']['editable'] = true;
        $model->_a['cols']['test_id']['editable'] = true;
        $model->_a['cols']['project_id']['editable'] = true;
        $p['model'] = $model;
        $request->REQUEST['writer_id'] = $request->user->id;
        $request->REQUEST['test_id'] = $test->id;
        $request->REQUEST['project_id'] = $test->get_project()->id;
        $log = $this->createManyToOne($request, $match, $p);
        return $log;
    }

    public function createComment($request, $match, $params)
    {
        $model = new TMS_ActivityComment();
        $model->_a['cols']['writer_id']['editable'] = true;
        $params['model'] = $model;
        $request->REQUEST['writer_id'] = $request->user->id;
        return parent::createManyToOne($request, $match, $params);
    }

    public function updateComment($request, $match, $params)
    {
        $request->REQUEST['writer_id'] = $request->user->id;
        return parent::updateManyToOne($request, $match, $params);
    }

    public function deleteComment($request, $match, $params)
    {
        return parent::deleteManyToOne($request, $match, $params);
    }
}