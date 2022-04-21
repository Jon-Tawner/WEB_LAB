<?php

namespace  app\_user\controllers;

use app\core\Controller;

class GuestBook extends Controller {

    public function show_Action() {
        $vars = $this->model->getFileText();

        $vars = $this->parseRecords($vars);

        if (!empty($_POST))
            $this->sendMessage();

        $vars = array_reverse($vars);

        $this->view->render('Гостевая книга', $vars, $this->model->validation->Errors);
    }



    public function parseRecords($records) {
        $arr = [];
        foreach ($records as $key => $value) {
            $arr["fio"] = substr($value, 0, strpos($value, ';'));
            $value = strstr($value, ";");
            $arr["email"] = substr($value, 1, @strpos($value, ';', 1) - 1);
            $value = substr($value, 1);
            $value = strstr($value, ";");
            $arr["content"] = substr($value, 1);
            $records[$key] = $arr;
        }
        return $records;
    }

    public function sendMessage() {
        $this->model->validate_show_Action();
        if (empty($this->model->validation->Errors))
            $this->model->saveMessage();
    }
}
