<?php

namespace app\models;

class GuestBook {
    public $path = "public/files/messages.inc.txt";

    public function getFileText() {
        return file($this->path);
    }
}
