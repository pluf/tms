<?php

class TMS_Views_ActivityOutput extends Pluf_Views
{
    public function createOutput($request, $match, $p){
        Pluf::loadFunction('Pluf_Shortcuts_GetObjectOr404');
        $activity = Pluf_Shortcuts_GetObjectOr404('TMS_Activity', $request->REQUEST['activity_id']);
        $output = $this->createObject($request, $match, $p);
        $output->activity_id = $activity;
        $output->update();
        return $output;
    }
    
}