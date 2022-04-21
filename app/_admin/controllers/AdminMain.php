<?php

namespace app\_admin\controllers;

use app\core\Controller;

class AdminMain extends Controller {

    public function show_Action() {

        $this->view->render('Главная страница');
    }
}
