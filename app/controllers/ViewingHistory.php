<?php

namespace app\controllers;

use app\core\Controller;

class ViewingHistory extends Controller {

    public function show_Action() {
        $this->view->render('История просмотров');
    }
}
