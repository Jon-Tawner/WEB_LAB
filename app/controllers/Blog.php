<?php

namespace app\controllers;

use app\core\Controller;

class Blog extends Controller {
    public function show_Action() {
        $lenPage = 2;
        $vars = array();

        $vars["page"] = isset($_GET["page"]) ? $this->setPage($_GET["page"]) : 0;

        $firsElementPage = $vars["page"] * $lenPage;
        $vars['regords'] = $this->model->table->getRecords($firsElementPage, $lenPage, "ORDER BY date DESC");

        $this->view->render('Мой блог', $vars, $this->model->validation->Errors);
    }

    public function editor_Action() {
        if (!empty($_POST)) {
            $this->model->validate_editor_Action();
            if (empty($this->model->validation->Errors))
                $this->saveBlog();
        }

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



    public function setPage($pageIn) {
        $countRecords = $this->model->table->getCount();
        $countPages = (int)($countRecords / 2);
        if ($pageIn <= $countPages && $pageIn > 0)
            $pageOut = $pageIn;
        elseif ($pageIn > $countPages)
            $pageOut = $countPages;
        else
            $pageOut = 0;

        return $pageOut;
    }

    public function importCVS() {
        if ($vars = $this->model->getFromCVS($_FILES['cvs']["tmp_name"])) {
            foreach ($vars as $value) {
                if ($this->model->savePrepare($value['title'], $value['content'], $value['date'], $value['author']) === false);
                echo "Не удалось загрузить данные с заголовком:" . $value['title'] . "<br>";
            }
            echo "Файл загружен<br>";
        } else
            echo "Файл нe загружен<br>";
    }

    public function saveBlog() {
        $failure = false;
        if (!empty($_FILES["img"]["name"])) {
            if ($this->model->saveImage($_FILES["img"]))
                if ($this->model->save($_POST['title'], $_POST['content'], date('d.m.y h:i:s'), 'ME', $_FILES["img"]['name']) === false) {
                    $failure = true;
                    if (unlink("../website/public/blog/img/" . $_FILES["img"]["name"]) == false)
                        echo "Не даляет файл" . $_FILES["img"]['name'];
                }
        } else
            $failure = !$this->model->save($_POST['title'], $_POST['content'], date('d.m.y h:i:s'), 'ME');

        if ($failure === false)
            echo "Данные загружены<br>";
        else
            echo "Данные нe загружены<br>";
    }
}
