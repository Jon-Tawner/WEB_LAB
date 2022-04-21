<?php

namespace  app\_user\controllers;

use app\core\Controller;

class Contact extends Controller {

    public function show_Action() {
        if (!empty($_POST))
            $this->model->validate();

        $this->view->render('Контакты', [], $this->model->validation->Errors);
    }
}
