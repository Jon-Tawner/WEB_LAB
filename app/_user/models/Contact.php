<?php

namespace app\_user\models;

use app\validators\FormValidation;

class Contact {
    public $validation;

    public function __construct() {
        $this->validation = new FormValidation();
    }

    public function validate() {

        $this->validation->SetRule('FIO', 'isNotEmpty|isString');
        $this->validation->SetRule('phone', 'isPhone');
        $this->validation->SetRule('date', 'isDate');


        $this->validation->validate(['FIO', 'phone', 'date']);
    }
}
