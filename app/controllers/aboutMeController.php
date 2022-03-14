<?php

namespace app\controllers;

use app\core\Controller;

class aboutMeController extends Controller
{

    public function showAction()
    {
        $this->view->render('Обо мне');
    }
}
