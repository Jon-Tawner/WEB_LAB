<?php

namespace app\core;

use app\core\View;

abstract class Controller
{
    public $model;
    public $view;
    public $route;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name)
    {
        $path = 'app\models\\' . $name;
        if (class_exists($path)) {
            return new $path;
        }
    }
}
