<?php

namespace app\models\tables;

use app\core\BaseActiveRecord;

class Blog extends BaseActiveRecord {
    protected static $tablename = 'blog';
    public $id;
    public $title;
    public $img;
    public $content;
    public $date;
    public $author;


    public function savePrepare() {
        [$values, $fields] = static::getData();

        $sql = static::$pdo->prepare("INSERT INTO " . static::$tablename . " (" . join(', ', array_slice($fields, 1)) . ") VALUES(:" . join(', :', array_slice($fields, 1)) . ")");

        //! Почему ты не работаешь!?
        // $countParam = count($fields);
        // for ($i = 1; $i < $countParam; $i++) {
        //     $sql->bindParam(":$fields[$i]", $values[$i]);
        // }

        $sql->bindParam(":title", $this->title);
        $sql->bindParam(":img", $this->img);
        $sql->bindParam(":content", $this->content);
        $sql->bindParam(":date", $this->date);
        $sql->bindParam(":author", $this->author);

        $sql->execute();

        return $this;
    }
}
