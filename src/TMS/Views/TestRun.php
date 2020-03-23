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
Pluf::loadFunction('Pluf_Shortcuts_GetObjectOr404');

class TMS_Views_TestRun extends Pluf_Views
{

    /**
     * Creates new content
     *
     * @param Pluf_HTTP_Request $request
     * @param array $match
     * @throws \Pluf\Exception
     * @return TMS_TestRun
     */
    public function create($request, $match)
    {
        // initial content data
        $extra = array(
            'model' => new TMS_TestRun()
        );
        $testId = array_key_exists('parentId', $match) ? $match['parentId'] : $request->REQUEST['test_id'];
        $test = Pluf_Shortcuts_GetObjectOr404('TMS_Test', $testId);
        $request->REQUEST['test_id'] = $test->id;
        // Create content and get its ID
        $form = new Pluf_Form_ModelBinaryCreate($request->REQUEST, $extra);
        // Upload content file and extract information about it (by updating
        // content)
        $extra['model'] = $form->save();
        $form = new Pluf_Form_ModelBinaryUpdate(array_merge($request->REQUEST, $request->FILES), $extra);
        try {
            $item = $form->save(false);
        } catch (\Pluf\Exception $e) {
            $item = $extra['model'];
            $item->delete();
            throw $e;
        }
        // Create Pipline to run the test
        // $pipeline = new Pluf\Jms\Pipeline();
        // $item->pipeline_id = $pipeline;
        // $item->update();
        // provide informations for pipline
        TMS_PiplineBuilder::createPipline($item);
        return $item;
    }

    /**
     * Download a content
     *
     * @param Pluf_HTTP_Request $request
     * @param array $match
     * @return Pluf_HTTP_Response_File
     */
    public function download($request, $match)
    {
        // GET data
        $item = Pluf_Shortcuts_GetObjectOr404('TMS_TestRun', $match['modelId']);
        // Do
        $response = new Pluf_HTTP_Response_File($item->getAbsloutPath(), $item->mime_type);
        $response->headers['Content-Disposition'] = sprintf('attachment; filename="%s"', $item->file_name);
        return $response;
    }

    /**
     * Upload a file as content
     *
     * @param Pluf_HTTP_Request $request
     * @param array $match
     * @return TMS_TestRun
     */
    public function updateFile($request, $match)
    {
        // Get data
        $item = Pluf_Shortcuts_GetObjectOr404('TMS_TestRun', $match['modelId']);
        // Do action
        if (array_key_exists('file', $request->FILES)) {
            $extra = array(
                'model' => $item
            );
            $form = new Pluf_Form_ModelBinaryUpdate(array_merge($request->REQUEST, $request->FILES), $extra);
            $item = $form->save();
            return $item;
        } else {
            $myfile = fopen($item->getAbsloutPath(), "w") or die("Unable to open file!");
            $entityBody = file_get_contents('php://input', 'r');
            fwrite($myfile, $entityBody);
            fclose($myfile);
            $item->update();
        }
        return $item;
    }

    public function query($request, $match)
    {
        $run = Pluf_Shortcuts_GetObjectOr404('TMS_TestRun', $match['modelId']);
        $requestParams = $request->REQUEST;
        $dbBuilder = new TMS_SampleDbBuilder();
        $dbParams = $dbBuilder->getDbParameters($run);
        // Make request to fetch events data
        $response = $this->fetchEvents($dbParams, $requestParams);

        if ("200" != $response->getStatusCode()) {
            throw new \Pluf\Exception($response->getBody()->getContents());
        }
        $contents = $response->getBody()->getContents();
        return json_decode($contents, true);
    }

    private function checkQuery($query)
    {
        $influxDateFormat = "Y-m-d'T'H:i:s'Z'";
        $start = time();
        $end = time();
        $res = $query;
        $res = str_replace('${start}', $start * 1000.0, $res);
        $res = str_replace('${end}', $end * 1000.0, $res);
        $res = str_replace('${startDateTime}', date($influxDateFormat, $start), $res);
        $res = str_replace('${startTimeStamp}', $start, $res);
        $res = str_replace('${endDateTime}', date($influxDateFormat, $end), $res);
        $res = str_replace('${endTimeStamp}', $end, $res);
        return $res;
    }

    private function fetchEvents($dbParams, $requestParams)
    {
        // Provide request parameters
        $uri = 'http://' . $dbParams['SAMPLE_DB_HOST'] . ':' . $dbParams['SAMPLE_DB_PORT'] . '/query';
        $params = array(
            'db' => $dbParams['SAMPLE_DB_NAME'],
            'epoch' => 'ms',
            'q' => $this->checkQuery($requestParams['query']),
            'pretty' => array_key_exists('pretty', $requestParams) ? $requestParams['pretty'] : true
        );
        if (array_key_exists('chunked', $requestParams) && $requestParams['chunked'] > 0) {
            $params['chunked'] = $requestParams['chunked'];
        }
        // Do request
        $client = new GuzzleHttp\Client();
        $response = $client->request('GET', $uri, array(
            'query' => $params
        ));
        return $response;
    }
}
