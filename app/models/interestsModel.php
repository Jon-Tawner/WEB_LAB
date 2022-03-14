<?php

namespace app\models;

use app\core\Model;

class interestsModel extends Model
{
    public function getInterests()
    {

        $result = $this->db->row('SELECT * FROM weblabs.interests');

        return $result;
    }
}
