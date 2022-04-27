<?php

namespace app\_share\models;

use app\validators\FormValidation;
use app\core\BaseActiveRecord;
use PDO;

class Account extends BaseActiveRecord {
    public $tablename = 'account';
    public $tableStatistic;
    public $id;
    public $name;
    public $login;
    public $email;
    public $password;
    public $validation;

    function __construct() {
        parent::__construct();
        $this->validation = new FormValidation;
    }

    public function validate_registration_Action() {
        $this->validation->SetRule('login', 'unique|oneWord');
        $this->validation->SetRule('password', 'isString|isMoreCharaters:5');

        $this->validation->validate(['login', 'password']);
    }

    public function saveUser($name, $login, $email, $password) {
        $this->name = $name;
        $this->login = $login;
        $this->email = $email;
        $this->password = md5($password);

        return parent::save();
    }

    public function existsLogin($login) {
        return $this->findAll(" WHERE login='$login'") ? true : false;
    }

    public function existsUser($login, $password) {
        $password = md5($password);
        $stmt = $this->pdo->query("SELECT * FROM " . $this->tablename . " WHERE login='$login' AND password='$password'");

        if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'login' => $user['login'],
                'password' => $user['password'],
            ];
            return true;
        } else {
            return false;
        }
    }
}
