<?php

namespace app\models;

use app\models\tables\Test as TTest;
use app\models\validators\ResultsVerification;

class Test
{
    public $validation;
    public $table;

    public function __construct()
    {
        $this->validation = new ResultsVerification();
        $this->table = new TTest;

        $this->validation->SetRule('FIO', 'isNotEmpty|isString');
        $this->validation->SetRule('int', 'isInteger');

        $this->validation->SetAnswer('int', 4);
        $this->validation->SetAnswer('2_task', 'буквой и цифрой');
        $this->validation->SetAnswer('group', '210х297');
    }

    public function validate()
    {
        $this->validation->validate(['FIO', 'int']);
    }

    public function save($rating)
    {
        $this->table->name = $_POST["FIO"];
        $this->table->answer2 = $_POST["int"];
        $this->table->answer3 = $_POST["2_task"];
        $this->table->answer1 = $_POST["group"];
        $this->table->rating = $rating;
        $this->table->date = date('d.m.y h:i:s');
        $this->table->save();
    }
}
