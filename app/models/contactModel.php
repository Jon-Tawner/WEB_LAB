<?php

namespace app\models;

use app\core\Model;
use app\models\validators\FormValidation;

class contactModel extends Model
{
    public function __construct()
    {
        $this->validation = new FormValidation();
    }

    public function validate($post)
    {

        $this->validation->SetRule('FIO', 'isNotEmpty|isString');
        $this->validation->SetRule('phone', 'isPhone');
        $this->validation->SetRule('date', 'isDate');


        $this->validation->validate(['FIO', 'phone', 'date']);
    }
}
