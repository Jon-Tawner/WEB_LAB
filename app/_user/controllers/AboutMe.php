<?php

namespace  app\_user\controllers;

use app\core\Controller;

class AboutMe extends Controller {

    public function show_Action() {
        $this->view->render('Обо мне');
    }
}
