<?php

namespace  app\_user\controllers;

use app\core\Controller;

class Courses extends Controller {

    public function show_Action() {
        $this->view->render('Учёба');
    }
}
