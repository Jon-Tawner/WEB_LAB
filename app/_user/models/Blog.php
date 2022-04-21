<?php

namespace app\_user\models;

use app\validators\FormValidation;
use app\core\BaseActiveRecord;

class Blog extends BaseActiveRecord {
    public $validation;

    public $tablename = 'blog';
    public $id;
    public $title;
    public $img;
    public $content;
    public $date;
    public $author;

    function __construct() {
        parent::__construct();
        $this->validation = new FormValidation;
    }

    public function validate_editor_Action() {
        $this->validation->SetRule('title', 'isNotEmpty|isString');
        $this->validation->SetRule('img', 'notRequired|isImage');

        $this->validation->validate(['title'], ['img']);
    }

    public function saveBlog($title, $content, $date, $author, $img = '') {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->img = $img;
        $this->date = $date;
        return parent::save();
    }

    public function saveImage($file) {
        $name = "../website/public/blog/img/" . $file["name"];
        return move_uploaded_file($file["tmp_name"], $name) ? true : false;
    }
}
