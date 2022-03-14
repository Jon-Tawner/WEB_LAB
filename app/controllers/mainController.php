<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\DB;

class MainController extends Controller
{

    public function indexAction()
    {
        $this->model->show();

        $this->view->render('Главная страница');
    }
}
