<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\DB;

class InterestsController extends Controller
{

    public function showAction()
    {
        $data = $this->model->getInterests();

        $this->view->render('Мои интересы', $data);
    }
}
