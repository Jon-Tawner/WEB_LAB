<?php

namespace app\controllers;

use app\core\Controller;

class ContactController extends Controller
{

    public function showAction()
    {
        if (!empty($_POST)) {
            $this->model->validate($_POST);
            //     if (!empty($this->model->validation->Errors)) {
            //          $this->model->validation->ShowErrors('error');
            //          $this->model->validation->ClearErrors();
            //     } else{
            //          $this->view->ShowSucces();
            //     }
        }
        $this->view->render('Контакты', $this->model->validation->Errors);

        $this->model->validation->ClearErrors();
    }
}
