<?php

class TMS_Views_Activity extends Pluf_Views
{

    public function createComment($request, $match, $params)
    {
        $request->request['writer_id'] = $request->user->id;
        return parent::createManyToOne($request, $match, $params);
    }

    public function updateComment($request, $match, $params)
    {
        $request->request['writer_id'] = $request->user->id;
        return parent::updateManyToOne($request, $match, $params);
    }

    public function deleteComment($request, $match, $params)
    {
        return parent::deleteManyToOne($request, $match, $params);
    }
}