<?php

namespace app\tables;

use app\core\BaseActiveRecord;

class CommentsBlog extends BaseActiveRecord {
    public $tablename = 'commentsblog';
    public $id;
    public $blogId;
    public $name;
    public $content;
    public $date;

    public function saveComment($name, $content, $blogId) {
        $this->name = $name;
        $this->date = date('d.m.y h:i:s');
        $this->content = $content;
        $this->blogId = $blogId;

        $this->save();
    }

    public function getComments($blogId) {
        return $this->findAll('where blogId=' . $blogId);
    }
}
