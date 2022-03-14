<?php

namespace app\controllers;

use app\core\Controller;

class CoursesController extends Controller
{

    public function showAction()
    {
        $this->view->render('Учёба');
    }
}
