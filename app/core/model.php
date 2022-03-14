<?php

namespace app\core;

use app\lib\DB;

abstract class Model
{
    public $db;
    public $validation;

    public function __construct()
    {
        $this->db = new DB;
    }
}
