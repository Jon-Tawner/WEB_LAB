<?php

namespace app\models;

use app\core\BaseActiveRecord;

class Blog extends BaseActiveRecord {
    public $tablename = 'blog';
    public $id;
    public $title;
    public $img;
    public $content;
    public $date;
    public $author;
}
