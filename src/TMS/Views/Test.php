<?php

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
        $user->_a['views']['myView'] = array(
            'select' => $user->getSelect(),
            'join' => 'LEFT JOIN ' . $assocTable . ' ON ' . $userTable . '.id=' . $assocTable . '.' . $userFk
        );

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
}