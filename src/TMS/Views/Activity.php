<?php

class TMS_Views_Activity extends Pluf_Views
{
<<<<<<< HEAD
    
    public function addLog($request, $match, $p){
        $log = $this->createManyToOne($request, $match, $p);
        $activity = $log->get_activity();
        $log->writer_id = $request->user;
        $log->test_id = $activity->get_test();
        $log->project_id = $activity->get_project();
        $log->update();
        return $log;
    }
    
=======

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
>>>>>>> branch 'develop' of https://github.com/pluf/tms.git
}