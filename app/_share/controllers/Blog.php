<?php

namespace  app\_share\controllers;

use app\core\Controller;

class Blog extends Controller {
    public function show_Action() {
        $lenPage = 2;
        $vars = array();

        $vars["countBlogsInPage"] = $lenPage;
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

    public function sendCVS_Action() {

        if (!empty($_POST)) {
            $this->model->validate_sendCVS_Action();
            if (empty($this->model->validation->Errors))
                $this->importCVS();
        }

        $this->view->render('Загрузка сообщений блога', [], $this->model->validation->Errors);
    }

    public function saveChangeBlog_Action() {
        $this->model->validate_editor_Action();
        if (empty($this->model->validation->Errors)) {
            $this->model->id = $_POST["id"];
            if ($this->saveBlog()) {
                echo "<p>" . $_POST['date'] . "</p>";
                echo "<p>" . $_POST['title'] . "</p>";
                if (!empty($_FILES["img"]["name"]))
                    echo  "<div class='photo'> <img class='img' style='height: 200px' src='/website/public/blog/img/" . $_FILES["img"]["name"] . "'></div>";
                echo "<p>" . $_POST['content'] . "</p>";
            }
        }
    }

    public function getDataBlog_Action() {
        echo json_encode($this->model->getDataBlog());
    }

    public function saveComment_Action() {
        echo file_get_contents('php://input');
        $this->model->saveComment();
    }

    public function getComments_Action() {
        $comments = $this->model->getComments();
        $respond = '';
        if ($comments)
            foreach ($comments as $key => $value) {
                $respond .= '<p>' . $value->content . '</p>' .
                    '<p>' . $value->date . ' : ' . $value->name . '</p>' .
                    '<hr>';
            }
        echo $respond;
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

    public function importCVS() {
        if ($vars = $this->model->getFromCVS($_FILES['cvs']["tmp_name"])) {
            foreach ($vars as $value) {
                if ($this->model->savePrepareBlog($value['title'], $value['content'], $value['date'], $value['author']) === false);
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
                if ($this->model->saveBlog($_POST['title'], $_POST['content'], date('d.m.y h:i:s'), 'ME', $_FILES["img"]['name']) === false) {
                    $failure = true;
                    if (unlink("../website/public/blog/img/" . $_FILES["img"]["name"]) == false)
                        echo "Не даляет файл" . $_FILES["img"]['name'];
                }
        } else
            $failure = !$this->model->saveBlog($_POST['title'], $_POST['content'], date('d.m.y h:i:s'), 'ME');

        return !$failure;
    }
}
