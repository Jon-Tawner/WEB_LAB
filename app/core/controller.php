<?php

namespace app\core;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

use app\models\tables\Statistics;
use app\core\View;

abstract class Controller {
    public $tableStatistic;
    public $model;
    public $view;
    public $route;

    public function __construct($route) {
        $this->route = $route;
        $this->view = new View($route);

        $this->model = $this->loadModel($route['controller']);

        if (isset($_SESSION['user']) && !isset($_SESSION['isAdmin'])) {
            $this->tableStatistic = new Statistics;
            $this->tableStatistic->saveStatistic($route['controller'] . '/' . $route['action']);
        }
    }

    public function loadModel($name) {
        if (isset($_SESSION['isAdmin']))
            $path = 'app\admin\models\\Admin' . $name;
        else
            $path = 'app\models\\' . $name;
        if (class_exists($path)) {
            return new $path;
        }
    }
}
