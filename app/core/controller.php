<?php

namespace app\core;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

use app\tables\Statistics;
use app\core\View;

abstract class Controller {
    public $tableStatistic;
    public $model;
    public $view;
    public $route;

    public function __construct($route) {
        $this->route = $route;
        $this->view = new View($route);
        if (class_exists($route['model_path']))
            $this->model = new $route['model_path'];


        if (isset($_SESSION['user']) && !isset($_SESSION['user']['isAdmin'])) {
            $this->tableStatistic = new Statistics;
            $this->tableStatistic->saveStatistic($route['controller'] . '/' . $route['action']);
        }
    }
}
