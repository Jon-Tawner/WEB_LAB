<?php

namespace  app\_user\controllers;

use app\core\Controller;

class Blog extends Controller {
    public function show_Action() {
        $lenPage = 2;
        $vars = array();

        $vars["page"] = isset($_GET["page"]) ? $this->setPage($_GET["page"], $lenPage) : 1;
        $firsElementPage = ($vars["page"] - 1) * $lenPage;

        $vars['reсords'] = $this->model->getRecords($firsElementPage, $lenPage, "ORDER BY date DESC");

        $this->view->render('Блог', $vars, $this->model->validation->Errors);
    }

    public function editor_Action() {
        if (!empty($_POST)) {
            $this->model->validate_editor_Action();
            if (empty($this->model->validation->Errors))
                $this->saveBlog();
        }

        $this->view->render('Редактор блога', [], $this->model->validation->Errors);
    }

    public function setPage($pageIn, $lenPage) {
        $countRecords = $this->model->getCount() - 1;
        $countPages = ceil($countRecords / $lenPage);

        if ($pageIn <= $countPages && $pageIn > 0)
            $pageOut = $pageIn;
        elseif ($pageIn > $countPages)
            $pageOut = $countPages;
        else
            $pageOut = 1;

        return $pageOut;
    }

    public function saveBlog() {
        $failure = false;
        if (!empty($_FILES["img"]["name"])) {
            if ($this->model->saveImage($_FILES["img"]))
                if ($this->model->saveBlog($_POST['title'], $_POST['content'], date('d.m.y h:i:s'), 'ME', $_FILES["img"]['name']) === false) {
                    $failure = true;
                    if (unlink("../website/public/blog/img/" . $_FILES["img"]["name"]) == false)
                        echo "Не даляет файл" . $_FILES["img"]['name'];
                }
        } else
            $failure = !$this->model->saveBlog($_POST['title'], $_POST['content'], date('d.m.y h:i:s'), 'ME');

        if ($failure === false)
            echo "Данные загружены<br>";
        else
            echo "Данные нe загружены<br>";
    }
}
