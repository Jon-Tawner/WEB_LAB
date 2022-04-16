<?php

// namespace app\models\tables;

// use app\core\BaseActiveRecord;
// use PDO;

// class Account extends BaseActiveRecord {
//     public $tablename = 'account';
//     public $id;
//     public $name;
//     public $login;
//     public $email;
//     public $password;

//     public function existsLogin($login) {
//         $stmt = $this->pdo->query("SELECT * FROM " . $this->tablename . " WHERE login='$login'");

//         return $stmt->fetch() ? true : false;
//     }

//     public function existsUser($login, $password) {
//         $password = md5($password);
//         $stmt = $this->pdo->query("SELECT * FROM " . $this->tablename . " WHERE login='$login' AND password='$password'");

//         return $stmt->fetch() ? true : false;
//     }
// }
