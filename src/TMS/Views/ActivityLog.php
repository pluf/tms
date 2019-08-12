<?php

class TMS_Views_ActivityLog extends Pluf_Views
{
    public function createLog($request, $match, $p){
        Pluf::loadFunction('Pluf_Shortcuts_GetObjectOr404');
        $activity = Pluf_Shortcuts_GetObjectOr404('TMS_Activity', $request->REQUEST['activity_id']);
        $log = $this->createObject($request, $match, $p);
        $log->writer_id = $request->user;
        $log->activity_id = $activity;
        $log->test_id = $activity->get_test();
        $log->project_id = $activity->get_project();
        $log->update();
        return $log;
    }
    
}