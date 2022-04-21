<?php

namespace  app\_user\controllers;

use app\core\Controller;

class Interests extends Controller {

    public function show_Action() {
        $vars = $this->model->findAll('WHERE name=\'' . $_SESSION['user']['name'] . '\'');

        $this->view->render('Мои интересы', $vars);
    }
}
