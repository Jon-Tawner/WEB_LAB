<?php

namespace app\models\tables;

use app\core\BaseActiveRecord;

class Test extends BaseActiveRecord
{
    protected static $tablename = 'testhistory';
    public $id;
    public $name;
    public $answer1;
    public $answer2;
    public $answer3;
    public $rating;
    public $date;
}
