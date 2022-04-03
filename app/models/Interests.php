<?php

namespace app\models;

use app\models\tables\Interests as TInterests;

class Interests
{
    public $table;

    function __construct()
    {
        $this->table = new TInterests;
    }
}
