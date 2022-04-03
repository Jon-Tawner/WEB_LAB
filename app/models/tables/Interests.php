<?php

namespace app\models\tables;

use app\core\BaseActiveRecord;

class Interests extends BaseActiveRecord
{
    protected static $tablename = 'interests';
    public $id;
    public $title;
    public $anchor;
    public $content;
}
