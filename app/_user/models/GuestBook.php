<?php

namespace app\_user\models;

use app\validators\FormValidation;

class GuestBook {
    public $path = "public/files/messages.inc.txt";
    public $file;
    public $validation;

    function __construct() {
        $this->file = fopen($this->path, "a");
        $this->validation = new FormValidation();
    }

    public function validate_show_Action() {

        $this->validation->SetRule('FIO', 'isNotEmpty|isString');
        $this->validation->SetRule('email', 'isEmail');

        $this->validation->validate(['FIO', 'email']);
    }

    public function getFileText() {
        return file($this->path);
    }

    public function saveMessage() {
        $message = PHP_EOL . $_POST["FIO"] . ';' . $_POST["email"] . ';' . $_POST["text"];
        if (!fwrite($this->file, $message))
            echo "Ошибка записи в файл: " . $this->path;
    }

    public function saveBook($file) {
        $name = "public/files/" . $file["name"];
        return move_uploaded_file($file["tmp_name"], $name) ? true : false;
    }
}
