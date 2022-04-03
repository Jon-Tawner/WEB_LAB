<?php

// namespace app\lib;

// use PDO;

// class DB
// {

//     protected $db;

//     public function __construct()
//     {
//         $config = require 'app/config/db.php';
//         $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname' . $config['name'] . '', $config['user'], $config['password']);
//     }

//!     public function query($sql, $params = [])
//!     {
//!         $statement = $this->db->prepare($sql);
//!         if (!empty($params)) {
//!             foreach ($params as $key => $value) {
//!                 $statement->bindValue(':' . $key, $value);
//!             }
//!         }
//!         $statement->execute();
//!         return $statement;
//!     }

//     public function row($sql, $params = [])
//     {
//         return $this->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
//     }

//     public function column($sql, $params = [])
//     {
//         return $this->query($sql, $params)->fetchColumn();
//     }
// }
