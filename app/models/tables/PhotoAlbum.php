<?php

namespace app\models\tables;

use app\core\BaseActiveRecord;

class PhotoAlbum extends BaseActiveRecord
{
    protected static $tablename = 'photo';
    public $id;
    public $name;
    public $file;
    public $alt;
}
