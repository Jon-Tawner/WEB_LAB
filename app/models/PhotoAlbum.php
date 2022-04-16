<?php

namespace app\models;

use app\core\BaseActiveRecord;

class PhotoAlbum extends BaseActiveRecord {
    public $tablename = 'photo';
    public $id;
    public $name;
    public $file;
    public $alt;
}
