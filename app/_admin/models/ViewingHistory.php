<?php

namespace  app\_admin\models;

use app\core\BaseActiveRecord;

class ViewingHistory extends BaseActiveRecord {
    public $tablename = 'statistics';
    public $id;
    public $date;
    public $ip;
    public $page;
    public $host;
    public $browser;
}
