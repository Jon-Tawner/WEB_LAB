<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\DB;

class PhotoAlbumController extends Controller
{

    public function showAction()
    {
        $db = new DB;

        $data = $db->row('SELECT * FROM weblabs.photo');

        $this->view->render('Фотоальбом', $data);
    }
}
