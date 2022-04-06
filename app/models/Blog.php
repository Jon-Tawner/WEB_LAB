<?php

namespace app\models;

use app\models\validators\FormValidation;
use app\models\tables\Blog as TBlog;

class Blog {
    public $table;
    public $validation;

    function __construct() {
        $this->table = new TBlog;
        $this->validation = new FormValidation;
    }

    public function validate_editor_Action() {
        $this->validation->SetRule('title', 'isNotEmpty|isString');
        $this->validation->SetRule('img', 'notRequired|isImage');

        $this->validation->validate(['title'], ['img']);
    }

    public function validate_sendCVS_Action() {
        $this->validation->SetRule('cvs', 'isExtension:application/vnd.ms-excel');

        $this->validation->validate([], ['cvs']);
    }


    public function getFromCVS($file) {
        $arrEl = array();
        $el = array();
        $fd = fopen($file, "r") or die("Файл нельзя открыть");

        while (($data = fgetcsv($fd, 1000, ";")) !== FALSE) {
            $el['title'] = $data[0];
            $el['content'] = $data[1];
            $el['author'] = $data[2];
            $el['date'] = $data[3];
            $arrEl[] = $el;
        }
        fclose($fd);

        return $arrEl;
    }

    public function savePrepare($title, $content, $date, $author, $img = '') {
        $newRecord = new TBlog;

        $newRecord->title = $title;
        $newRecord->content = $content;
        $newRecord->author = $author;
        $newRecord->img = $img;
        $newRecord->date = $date;
        return $newRecord->savePrepare();
    }

    public function save($title, $content, $date, $author, $img = '') {
        $newRecord = new TBlog;

        $newRecord->title = $title;
        $newRecord->content = $content;
        $newRecord->author = $author;
        $newRecord->img = $img;
        $newRecord->date = $date;
        return $newRecord->save();
    }

    public function saveImage($file) {
        $name = "../website/public/blog/img/" . $file["name"];
        return move_uploaded_file($file["tmp_name"], $name) ? true : false;
    }
}
