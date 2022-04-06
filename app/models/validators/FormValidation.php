<?php

namespace app\models\validators;

class FormValidation {
    public $Rules = [];
    public $Errors = [];
    public $post;
    public $files;

    public $messages = [
        'isNotEmpty' => 'Поле должно быть обязательно заполнено',
        'isInteger' => 'Поле должно быть целочисленным',
        'isString' => 'Поле должно быть строкой',
        'isLess' => 'Поле должно быть меньше ',
        'isGreater' => 'Поле должно быть больше ',
        'isEqual' => 'Поле должно быть равно ',
        'isEmail' => 'Поле должно быть в формате email',
        'isPhone' => 'Поле должно быть в формате номера телефона',
        'isDate' => 'Поле должно быть в формате ДД.ММ.ГГ',
        'isImage' => 'Файл должен быть в виде картинки!',
        'isFileName' => 'Файл должен быть с именем: ',
        'isExtension' => 'Файл должен быть типа: ',
    ];

    public $typeImages = [
        'image/jpeg', 'image/png',
    ];

    public function __construct() {
        $this->post = $_POST;
        $this->files = $_FILES;
    }

    public function validate($post_array = [], $fiels_array = []) {
        $this->validation($this->post, $post_array);
        $this->validation($this->files, $fiels_array);
    }

    public function validation($request, $field_array) {
        foreach ($field_array as $key) {
            $rul = explode('|', $this->Rules[$key]);
            foreach ($rul as $value) {
                $result = '';
                $params = explode(':', $value);
                $func = $params[0];
                if ($func == 'notRequired') {
                    if (empty($data))
                        break;
                    continue;
                }
                if ($func != $value) {
                    if (!$this->$func($request[$key], $params[1])) {
                        $result = $this->messages[$func] . $params[1];
                    }
                } else 
                    if (!$this->$value($request[$key]))
                    $result = $this->messages[$value];
                if ($result)
                    $this->Errors[$key][$func] = $result;
            }
        }
    }

    public function isExtension($file, $extension) {
        return $file["type"] == $extension ? true : false;
    }

    public function isFileName($file, $name) {
        return pathinfo($file["name"], PATHINFO_FILENAME) == $name ? true : false;
    }

    public function isImage($file) {
        return in_array($file["type"], $this->typeImages) ? true : false;
    }

    public function isPhone($data) {
        return preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $data) ? true : false;
    }

    public function isDate($data) {
        return preg_match('/^([1-9]|[12][0-9]|3[01])[\.]([1-9]|1[012])[\.](19|20)\d\d$/', $data) ? true : false;
    }

    public function isNotEmpty($data) {
        return !empty($data) ? true : false;
    }

    public function isInteger($data) {
        return is_numeric($data) ? true : false;
    }

    public function isString($data) {
        return !is_numeric($data) ? true : false;
    }

    public function isLess($data, $value) {
        return is_numeric($data) && ($data < $value) ? true : false;
    }

    public function isGreater($data, $value) {
        return is_numeric($data) && ($data > $value) ? true : false;
    }

    public function isEqual($data, $value) {
        return is_numeric($data) && ($data = $value) ? true : false;
    }

    public function isEmail($data) {
        return filter_var($data, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    public function SetRule($field_name, $validator_name) {
        if (isset($this->Rules[$field_name])) {
            $this->Rules[$field_name] += '|' . $validator_name;
        }
        $this->Rules[$field_name] = $validator_name;
    }

    public function ShowErrors($tagClass) {
        foreach ($this->Errors as $key1 => $value1) {
            foreach ($this->Errors[$key1] as $value2) {
                echo "<p class=\"$tagClass\"> " . $key1 . ': ' . $value2 . '</p>';
            }
        }
    }
}
