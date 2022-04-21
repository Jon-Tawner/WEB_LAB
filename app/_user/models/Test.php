<?php

namespace app\_user\models;

use app\validators\ResultsVerification;

use app\core\BaseActiveRecord;

class Test extends BaseActiveRecord {
    public $validation;

    public $tablename = 'testhistory';
    public $id;
    public $name;
    public $answer1;
    public $answer2;
    public $answer3;
    public $rating;
    public $date;

    public function __construct() {
        parent::__construct();
        $this->validation = new ResultsVerification();

        $this->validation->SetRule('int', 'isInteger');

        $this->validation->SetAnswer('int', 4);
        $this->validation->SetAnswer('2_task', 'буквой и цифрой');
        $this->validation->SetAnswer('group', '210х297');
    }

    public function saveAnswer($rating) {
        $this->name = $_SESSION["user"]["name"];
        $this->answer2 = $_POST["int"];
        $this->answer3 = $_POST["2_task"];
        $this->answer1 = $_POST["group"];
        $this->rating = $rating;
        $this->date = date('d.m.y h:i:s');

        parent::save();
    }
}
