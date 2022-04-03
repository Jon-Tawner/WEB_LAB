<?php

namespace app\controllers;

use app\core\Controller;

class Test extends Controller {

    public function show_Action() {
        $vars = [];
        if (!empty($_POST)) {
            $vars = $this->checkAnswers();
        }

        $vars["history"] = $this->model->table->findAll();

        usort($vars["history"], function ($a, $b) {
            $date1 = $a->date;
            $date2 = $b->date;

            return $date2 < $date1 ? -1 : 1;
        });


        $this->view->render('Тест', $vars, $this->model->validation->Errors);
    }

    public function checkAnswers() {
        $vars = array();
        $this->model->validate();
        if (empty($this->model->validation->Errors)) {
            $vars["rating"] = $this->model->validation->CheckAnswer($_POST);
            $this->model->save($vars["rating"]);
        }
        return $vars;
    }
}
