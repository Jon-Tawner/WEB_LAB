<?php

namespace app\controllers;

use app\core\Controller;

class TestController extends Controller
{

    public function showAction()
    {
        $result = [];
        if (!empty($_POST)) {
            $this->model->validate();
            if (!empty($this->model->validation->Errors)) {
                $result["errors"] = $this->model->validation->Errors;
            } else {
                $result["rating"] = $this->model->validation->CheckAnswer($_POST);
            }
        }
        $this->view->render('Тест', $result);

        $this->model->validation->ClearErrors();
    }
}
