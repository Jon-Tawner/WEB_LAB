<?php

namespace app\_share\controllers;

use app\core\Controller;

class PhotoAlbum extends Controller {

    public function show_Action() {
        $vars = $this->model->findAll();

        $this->view->render('Фотоальбом', $vars);
    }
}
