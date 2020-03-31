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
class TMS_Views_Test extends Pluf_Views
{

    public function members($request, $match)
    {
        $test = Pluf_Shortcuts_GetObjectOr404('TMS_Test', $match['parentId']);
        $user = new User_Account();
        $userTable = $user->_con->pfx . $user->_a['table'];
        Pluf::loadFunction('Pluf_Shortcuts_GetAssociationTableName');
        $assocTable = $user->_con->pfx . Pluf_Shortcuts_GetAssociationTableName('User_Account', 'TMS_Test');
        Pluf::loadFunction('Pluf_Shortcuts_GetForeignKeyName');
        $userFk = Pluf_Shortcuts_GetForeignKeyName('User_Account');
        $user->setView('myView', array(
            'select' => $user->getSelect(),
            'join' => 'LEFT JOIN ' . $assocTable . ' ON ' . $userTable . '.id=' . $assocTable . '.' . $userFk
        ));

        $testFk = Pluf_Shortcuts_GetForeignKeyName('TMS_Test');
        $builder = new Pluf_Paginator_Builder($user);
        return $builder->setWhereClause(new Pluf_SQL($testFk . '=%s', array(
            $test->id
        )))
            ->setView('myView')
            ->setRequest($request)
            ->build();
    }

    public static function addMember($request, $match)
    {
        $test = Pluf_Shortcuts_GetObjectOr404('TMS_Test', $match['parentId']);
        if (isset($match['modelId'])) {
            $userId = $match['modelId'];
        } else {
            $userId = isset($request->REQUEST['id']) ? $request->REQUEST['id'] : $request->REQUEST['modelId'];
        }
        $user = Pluf_Shortcuts_GetObjectOr404('User_Account', $userId);
        $test->setAssoc($user);
        return $user;
    }

    public static function removeMember($request, $match)
    {
        $test = Pluf_Shortcuts_GetObjectOr404('TMS_Test', $match['parentId']);
        if (isset($match['modelId'])) {
            $userId = $match['modelId'];
        } else {
            $userId = isset($request->REQUEST['id']) ? $request->REQUEST['id'] : $request->REQUEST['modelId'];
        }
        $user = Pluf_Shortcuts_GetObjectOr404('User_Account', $userId);
        $test->delAssoc($user);
        return $user;
    }

    public function requirements($request, $match)
    {
        $test = Pluf_Shortcuts_GetObjectOr404('TMS_Test', $match['parentId']);
        $requirement = new TMS_Requirement();
        $userTable = $requirement->_con->pfx . $requirement->_a['table'];
        Pluf::loadFunction('Pluf_Shortcuts_GetAssociationTableName');
        $assocTable = $requirement->_con->pfx . Pluf_Shortcuts_GetAssociationTableName('TMS_Requirement', 'TMS_Test');
        Pluf::loadFunction('Pluf_Shortcuts_GetForeignKeyName');
        $userFk = Pluf_Shortcuts_GetForeignKeyName('TMS_Requirement');
        $requirement->setView('myView', array(
            'select' => $requirement->getSelect(),
            'join' => 'LEFT JOIN ' . $assocTable . ' ON ' . $userTable . '.id=' . $assocTable . '.' . $userFk
        ));

        $testFk = Pluf_Shortcuts_GetForeignKeyName('TMS_Test');
        $builder = new Pluf_Paginator_Builder($requirement);
        return $builder->setWhereClause(new Pluf_SQL($testFk . '=%s', array(
            $test->id
        )))
            ->setView('myView')
            ->setRequest($request)
            ->build();
    }

    public static function addRequirement($request, $match)
    {
        $test = Pluf_Shortcuts_GetObjectOr404('TMS_Test', $match['parentId']);
        if (isset($match['modelId'])) {
            $requirementId = $match['modelId'];
        } else {
            $requirementId = isset($request->REQUEST['id']) ? $request->REQUEST['id'] : $request->REQUEST['modelId'];
        }
        $requirement = Pluf_Shortcuts_GetObjectOr404('TMS_Requirement', $requirementId);
        $test->setAssoc($requirement);
        return $requirement;
    }

    public static function removeRequirement($request, $match)
    {
        $test = Pluf_Shortcuts_GetObjectOr404('TMS_Test', $match['parentId']);
        if (isset($match['modelId'])) {
            $requirementId = $match['modelId'];
        } else {
            $requirementId = isset($request->REQUEST['id']) ? $request->REQUEST['id'] : $request->REQUEST['modelId'];
        }
        $requirement = Pluf_Shortcuts_GetObjectOr404('TMS_Requirement', $requirementId);
        $test->delAssoc($requirement);
        return $requirement;
    }
}