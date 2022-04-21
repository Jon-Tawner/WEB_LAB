<?php

namespace app\tables;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

use app\core\BaseActiveRecord;

class Statistics extends BaseActiveRecord {
    public $tablename = 'statistics';
    public $id;
    public $userLogin;
    public $date;
    public $ip;
    public $page;
    public $host;
    public $browser;

    public function saveStatistic($page) {
        $this->userLogin = $_SESSION['user']['login'];
        $this->date = date('d.m.y h:i:s');
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->page = $page;
        $this->host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this->browser = $_SERVER['HTTP_USER_AGENT'];

        $this->save();
    }
}
