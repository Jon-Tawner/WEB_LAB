<?php

namespace app\admin\models;

use app\models\validators\FormValidation;
use app\core\BaseActiveRecord;

class AdminBlog extends BaseActiveRecord {
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

    public function validate_sendCVS_Action() {
        $this->validation->SetRule('cvs', 'isExtension:application/vnd.ms-excel');

        $this->validation->validate([], ['cvs']);
    }


    public function getFromCVS($file) {
        $arrEl = array();
        $fd = fopen($file, "r") or die("Файл нельзя открыть");

        while (($data = fgetcsv($fd, 1000, ";")) !== FALSE)
            $arrEl[] = array_combine(['title', 'content', 'author', 'date'], $data);

        fclose($fd);

        return $arrEl;
    }

    public function savePrepareBlog($title, $content, $date, $author, $img = '') {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->img = $img;
        $this->date = $date;
        return $this->savePrepare();
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

    public function savePrepare() {

        $stmt = $this->pdo->prepare("INSERT INTO " . $this->tablename . " (" . join(', ', array_slice(array_keys($this->dbfields), 1)) . ") VALUES(:" . join(', :', array_slice(array_keys($this->dbfields), 1)) . ")");

        //! Почему ты не работаешь!?
        // $countParam = count($fields);
        // for ($i = 1; $i < $countParam; $i++) {
        //     $stmt->bindParam(":$fields[$i]", $values[$i]);
        // }

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":img", $this->img);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":author", $this->author);

        return $stmt->execute();
    }
}
