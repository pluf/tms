<?php

class TMS_Views_ActivityComment extends Pluf_Views
{

    /**
     * Create comment with current user as writer
     *
     * @param Pluf_HTTP $request
     * @param array $match
     * @param array $p
     * @return TMS_ActivityComment
     */
    public function createObject($request, $match, $p)
    {
        $model = new TMS_ActivityComment();
        $model->_a['cols']['writer_id']['editable'] = true;
        $model->_a['cols']['activity_id']['editable'] = true;
        $p['model'] = $model;
        $request->REQUEST['writer_id'] = $request->user->id;
        return parent::createObject($request, $match, $p);
    }
}