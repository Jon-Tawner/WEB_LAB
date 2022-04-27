<?php

namespace app\_share\controllers;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

use app\core\Controller;

class Account extends Controller {

    private $adminsLog = [
        [
            'login' => 'root',
            'password' => '63a9f0ea7bb98050796b649e85481845',
            'name' => 'Пасевич Александр Павлович'
        ],
    ];


    public function checkLogin_Action() {
        if ($this->model->existsLogin(file_get_contents('php://input')))
            echo "Login exists";
    }

    public function registration_Action() {

        if (!empty($_POST)) {
            $this->model->validate_registration_Action();
            if (empty($this->model->validation->Errors))
                $this->addNewUser();
        }

        $this->view->render('Регистрация');
    }

    public function authorization_Action() {
        $vars = [];
        if (!empty($_POST)) {
            if ($this->model->existsUser($_POST["login"], $_POST["password"])) {
                if ($this->isAdmin())
                    $_SESSION['user']['isAdmin'] = 1;
                $this->view->redirect("http://localhost/website/Main/show");
            } else {
                $vars["errors"] = ["User not found" => "Не удаётся найти пользователя"];
            }
        }

        $this->view->render('Авторизация', $vars);
    }

    public function addNewUser() {
        if ($this->model->existsLogin($_POST["login"]))
            echo "<div class='error'>Текущий логин уже занят, Выберите другой</div><br>";
        else 
            if ($this->model->saveUser($_POST["name"], $_POST["login"], $_POST["email"], $_POST["password"]))
            $this->view->redirect("http://localhost/website/Main/show");
        else
            echo "Что-то пошло не так, вас не смогли сохраить в базу данных";
    }

    public function isAdmin() {
        foreach ($this->adminsLog as $value) {
            if ($_SESSION['user']['login'] == $value["login"] && $_SESSION['user']['password'] == $value['password'])
                return true;
        }
        return false;
    }
}
