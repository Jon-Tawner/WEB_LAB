<?php

namespace app\controllers;

use app\core\Controller;

class GuestBook extends Controller {

    public function show_Action() {
        $vars = $this->model->getFileText();

        $vars = $this->parseRecords($vars);

        $vars = array_reverse($vars);

        $this->view->render('Гостевая книга', $vars);
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
}
