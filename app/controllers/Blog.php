<?php

namespace app\controllers;

use app\core\Controller;

class Blog extends Controller {
    public function show_Action() {
        $lenPage = 2;
        $vars = array();

        $this->setPage($_GET["page"]);

        if (isset($_GET["page"])) {
            $vars["page"] = $_GET["page"] < 0 ? 0 : $_GET["page"];
        } else {
            $vars["page"] = 0;
        }

        if (!empty($_POST)) {
            $this->model->validate_editor_Action();
            if (empty($this->model->validation->Errors))
                $this->saveBlog();
        }

        $firsElementPage = $vars["page"] * $lenPage;
        $vars['regords'] = $this->model->table->getRecords($firsElementPage, $lenPage, "ORDER BY date DESC");

        $this->view->render('Мой блог', $vars, $this->model->validation->Errors);
    }

    public function editor_Action() {
        $this->view->render('Редактор блога', [], $this->model->validation->Errors);
    }

    public function sendCVS_Action() {

        if (!empty($_POST)) {
            $this->model->validate_sendCVS_Action();
            if (empty($this->model->validation->Errors))
                $this->importCVS();
        }

        $this->view->render('Загрузка сообщений блога', [], $this->model->validation->Errors);
    }



    public function setPage($page) {
        if (isset($page)) {
            $vars["page"] = $page < 0 ? 0 : $page;
        } else {
            $vars["page"] = 0;
        }
    }

    public function importCVS() {
        if ($vars = $this->model->getFromCVS($_FILES['cvs']["tmp_name"])) {
            foreach ($vars as $value) {
                $this->model->savePrepare($value['title'], $value['content'], $value['date'], $value['author']);
            }
            echo "Файл загружен<br>";
        } else
            echo "Файл нe загружен<br>";
    }

    public function saveBlog() {
        if (isset($_FILES["img"])) {
            if ($this->model->saveImage($_FILES["img"])) {
                $this->model->save($_POST['title'], $_POST['content'], date('d.m.y h:i:s'), 'ME', $_FILES["img"]['name']);
                echo "Данные загружены<br>";
            } else
                echo "Данные нe загружены<br>";
        } else {
            $this->model->save($_POST['title'], $_POST['content'], date('d.m.y h:i:s'), 'ME');
            echo "Данные загружены<br>";
        }
    }
}
