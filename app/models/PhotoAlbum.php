<?php

namespace app\models;

use app\models\tables\PhotoAlbum as TPhotoAlbum;

class PhotoAlbum
{
    public $table;

    function __construct()
    {
        $this->table = new TPhotoAlbum;
    }
}
