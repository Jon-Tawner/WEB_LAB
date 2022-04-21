<?php

namespace app\_user\models;

use app\core\BaseActiveRecord;

class Interests extends BaseActiveRecord {
    public $tablename = 'interests';
    public $id;
    public $title;
    public $anchor;
    public $content;
}
