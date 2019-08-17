<?php

class TMS_Views_ActivityStep extends Pluf_Views
{
    /**
     * Create an activity-step
     *
     * @param Pluf_HTTP $request
     * @param array $match
     * @param array $p
     * @return TMS_ActivityStep
     */
    public function createStep($request, $match, $p)
    {
        $model = new TMS_ActivityStep();
        $model->_a['cols']['activity_id']['editable'] = true;
        $p['model'] = $model;
        return parent::createObject($request, $match, $p);
    }
}