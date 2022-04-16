<?php

// namespace app\models\tables;

// use app\core\BaseActiveRecord;

// class Blog extends BaseActiveRecord {
//     public $tablename = 'blog';
//     public $id;
//     public $title;
//     public $img;
//     public $content;
//     public $date;
//     public $author;


//     public function savePrepare() {
//         [$values, $fields] = $this->getData();

//         $stmt = $this->pdo->prepare("INSERT INTO " . $this->tablename . " (" . join(', ', array_slice($fields, 1)) . ") VALUES(:" . join(', :', array_slice($fields, 1)) . ")");

//         //! Почему ты не работаешь!?
//         // $countParam = count($fields);
//         // for ($i = 1; $i < $countParam; $i++) {
//         //     $stmt->bindParam(":$fields[$i]", $values[$i]);
//         // }

//         $stmt->bindParam(":title", $this->title);
//         $stmt->bindParam(":img", $this->img);
//         $stmt->bindParam(":content", $this->content);
//         $stmt->bindParam(":date", $this->date);
//         $stmt->bindParam(":author", $this->author);

//         return $stmt->execute();
//     }
// }
