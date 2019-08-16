<?php

class TMS_Views_Requirement extends Pluf_Views
{

    public function tests($request, $match)
    {
        $requirement = Pluf_Shortcuts_GetObjectOr404('TMS_Requirement', $match['parentId']);
        $test = new TMS_Test();
        $testTable = $test->_con->pfx . $test->_a['table'];
        Pluf::loadFunction('Pluf_Shortcuts_GetAssociationTableName');
        $assocTable = $test->_con->pfx . Pluf_Shortcuts_GetAssociationTableName('TMS_Test', 'TMS_Requirement');
        Pluf::loadFunction('Pluf_Shortcuts_GetForeignKeyName');
        $testFk = Pluf_Shortcuts_GetForeignKeyName('TMS_Test');
        $test->_a['views']['myView'] = array(
            'select' => $test->getSelect(),
            'join' => 'LEFT JOIN ' . $assocTable . ' ON ' . $testTable . '.id=' . $assocTable . '.' . $testFk
        );

        $requirementFk = Pluf_Shortcuts_GetForeignKeyName('TMS_Requirement');
        $builder = new Pluf_Paginator_Builder($test);
        return $builder->setWhereClause(new Pluf_SQL($requirementFk . '=%s', array(
            $requirement->id
        )))
            ->setView('myView')
            ->setRequest($request)
            ->build();
    }

    public static function addTest($request, $match)
    {
        $requirement = Pluf_Shortcuts_GetObjectOr404('TMS_Requirement', $match['parentId']);
        if (isset($match['modelId'])) {
            $testId = $match['modelId'];
        } else {
            $testId = isset($request->REQUEST['id']) ? $request->REQUEST['id'] : $request->REQUEST['modelId'];
        }
        $test = Pluf_Shortcuts_GetObjectOr404('TMS_Test', $testId);
        $requirement->setAssoc($test);
        return $test;
    }

    public static function removeTest($request, $match)
    {
        $requirement = Pluf_Shortcuts_GetObjectOr404('TMS_Requirement', $match['parentId']);
        if (isset($match['modelId'])) {
            $testId = $match['modelId'];
        } else {
            $testId = isset($request->REQUEST['id']) ? $request->REQUEST['id'] : $request->REQUEST['modelId'];
        }
        $test = Pluf_Shortcuts_GetObjectOr404('TMS_Test', $testId);
        $requirement->delAssoc($test);
        return $test;
    }
}