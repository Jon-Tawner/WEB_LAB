<?php

namespace app\controllers;

use app\core\Controller;

class ViewingHistoryController extends Controller
{

    public function showAction()
    {
        $this->view->render('История просмотров');
    }
}
