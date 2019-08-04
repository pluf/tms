<?php

class TMS_DocumentedModel extends Pluf_Model
{

    /**
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        // $this->_a['table'] = 'tms_documentedmodel';
        // $this->_a['verbose'] = 'TMS_DocumentedModel';
        $this->_a['cols'] = array(
            'id' => array(
                'type' => 'Pluf_DB_Field_Sequence',
                'blank' => false,
                'editable' => false,
                'readable' => true
            ),
            'title' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'blank' => false,
                'is_null' => false,
                'size' => 256,
                'editable' => true,
                'readable' => true
            ),
            'description' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'blank' => true,
                'is_null' => true,
                'size' => 2048,
                'editable' => true,
                'readable' => true
            ),
//             'creation_dtime' => array(
//                 'type' => 'Pluf_DB_Field_Datetime',
//                 'blank' => true,
//                 'editable' => false,
//                 'readable' => true
//             ),
//             'modif_dtime' => array(
//                 'type' => 'Pluf_DB_Field_Datetime',
//                 'blank' => true,
//                 'editable' => false,
//                 'readable' => true
//             ),
//             'avatar' => array(
//                 'type' => 'Pluf_DB_Field_Varchar',
//                 'blank' => true,
//                 'is_null' => true,
//                 'size' => 300,
//                 'editable' => true,
//                 'readable' => true
//             )
        );

        // $this->_a['idx'] = array(
        // 'page_class_idx' => array(
        // 'col' => 'title',
        // 'type' => 'unique', // normal, unique, fulltext, spatial
        // 'index_type' => '', // hash, btree
        // 'index_option' => '',
        // 'algorithm_option' => '',
        // 'lock_option' => ''
        // )
        // );
    }

    /**
     * \brief پیش ذخیره را انجام می‌دهد
     *
     * @param $create boolean
     *            ساخت یا به روز رسانی را تعیین می‌کند
     */
    function preSave($create = false)
    {
//         if ($this->id == '') {
//             $this->creation_dtime = gmdate('Y-m-d H:i:s');
//         }
//         $this->modif_dtime = gmdate('Y-m-d H:i:s');
    }

    function toString()
    {
        return $this->title;
    }
}
