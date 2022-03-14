<?php

namespace app\models;

use app\core\Model;
use app\models\validators\ResultsVerification;

class testModel extends Model
{
    public function __construct()
    {
        $this->validation = new ResultsVerification();

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
}
