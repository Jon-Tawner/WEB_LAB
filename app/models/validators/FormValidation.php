<?php

namespace app\models\validators;

class FormValidation
{
    public $Rules = [];
    public $Errors = [];
    public $post;

    public $messages = [
        'isNotEmpty' => 'Поле должно быть обязательно заполнено',
        'isInteger' => 'Поле должно быть целочисленным',
        'isString' => 'Поле должно быть строкой',
        'isLess' => 'Поле должно быть меньше ',
        'isGreater' => 'Поле должно быть больше ',
        'isEmail' => 'Поле должно быть в формате email',
        'isPhone' => 'Поле должно быть в формате номера телефона',
        'isDate' => 'Поле должно быть в формате ДД.ММ.ГГ',
    ];

    public function validate($post_array)
    {
        $this->post = $_POST;

        foreach ($post_array as $key) {
            $funs = explode('|', $this->Rules[$key]);
            foreach ($funs as $value) {
                $result = '';
                $params = explode(':', $value);
                $func = $params[0];
                if ($func != $value) {
                    if (!$this->$func($this->post[$key], $params[1])) {
                        $result = $this->messages[$func] . $params[1];
                    }
                } else 
                    if (!$this->$value($this->post[$key]))
                    $result = $this->messages[$value];
                if ($result)
                    $this->Errors[$key][$func] = $result;
            }
        }
    }

    public function isPhone($data)
    {
        if (preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $data)) {
            return true;
        }
        return false;
    }

    public function isDate($data)
    {
        if (preg_match('/^([1-9]|[12][0-9]|3[01])[\.]([1-9]|1[012])[\.](19|20)\d\d$/', $data)) {
            return true;
        }
        return false;
    }

    public function isNotEmpty($data)
    {
        if (!empty($data)) {
            return true;
        }
        return false;
    }

    public function isInteger($data)
    {
        if (is_numeric($data)) {
            return true;
        }
        return false;
    }

    public function isString($data)
    {
        if (!is_numeric($data)) {
            return true;
        }
        return false;
    }

    public function isLess($data, $value)
    {
        if ($this->isInteger($data)) {
            if ($data < $value) {
                return true;
            }
            return false;
        }
    }

    public function isGreater($data, $value)
    {
        if ($this->isInteger($data)) {
            if ($data > $value) {
                return true;
            }
            return false;
        }
    }

    public function isEmail($data)
    {
        if (filter_var($data, FILTER_SANITIZE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function SetRule($field_name, $validator_name)
    {
        if (isset($this->Rules[$field_name])) {
            $this->Rules[$field_name] += '|' . $validator_name;
        }
        $this->Rules[$field_name] = $validator_name;
    }

    public function ShowErrors($tagClass)
    {
        foreach ($this->Errors as $key1 => $value1) {
            foreach ($this->Errors[$key1] as $value2) {
                echo "<p class=\"$tagClass\"> " . $key1 . ': ' . $value2 . '</p>';
            }
        }
    }

    public function ClearErrors()
    {
        $this->Errors = [];
    }
}
