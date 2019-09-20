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

class TMS_Views_VirtualUser extends Pluf_Views
{

    /**
     * Creates new content
     *
     * @param Pluf_HTTP_Request $request
     * @param array $match
     * @throws Pluf_Exception
     * @return TMS_VirtualUser
     */
    public function create($request, $match)
    {
        // initial content data
        $extra = array(
            'model' => new TMS_VirtualUser()
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
            $item = $form->save();
        } catch (Pluf_Exception $e) {
            $item = $extra['model'];
            $item->delete();
            throw $e;
        }
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
        $item = Pluf_Shortcuts_GetObjectOr404('TMS_VirtualUser', $match['modelId']);
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
     * @return TMS_VirtualUser
     */
    public function updateFile($request, $match)
    {
        // Get data
        $item = Pluf_Shortcuts_GetObjectOr404('TMS_VirtualUser', $match['modelId']);
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
}
