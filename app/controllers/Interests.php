<?php

namespace app\controllers;

use app\core\Controller;

class Interests extends Controller {

    public function show_Action() {
        $vars = $this->model->table->findAll();

        $this->view->render('Мои интересы', $vars);
    }
}
