<?php

namespace  app\_user\controllers;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

use app\core\Controller;

class Test extends Controller {

    public function show_Action() {
        $vars = [];
        if (!empty($_POST)) {
            $vars = $this->checkAnswers();
        }

        $vars["history"] = $this->model->findAll('WHERE name=\'' . $_SESSION['user']['name'] . '\'');
        if ($this->model->getCount() >= 2)
            usort($vars["history"], function ($a, $b) {
                $date1 = $a->date;
                $date2 = $b->date;

                return $date2 < $date1 ? -1 : 1;
            });


        $this->view->render('Тест', $vars, $this->model->validation->Errors);
    }

    public function checkAnswers() {
        $vars = array();
        $vars["rating"] = $this->model->validation->CheckAnswer($_POST);
        $this->model->saveAnswer($vars["rating"]);
        return $vars;
    }
}
