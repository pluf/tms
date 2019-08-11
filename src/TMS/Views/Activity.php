<?php

class TMS_Views_Activity extends Pluf_Views
{
    
    public function addLog($request, $match, $p){
        $log = $this->createManyToOne($request, $match, $p);
        $activity = $log->get_activity();
        $log->writer_id = $request->user;
        $log->test_id = $activity->get_test();
        $log->project_id = $activity->get_project();
        $log->update();
        return $log;
    }
    
}