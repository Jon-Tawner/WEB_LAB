<?php

namespace app\core;

class Router
{

    protected $route = [];


    public function __construct()
    {
        $this->route['controller'] = isset($_REQUEST["controller"]) ? $_REQUEST["controller"] : "main";
        $this->route['action'] = isset($_REQUEST['action']) ? $_REQUEST['action'] : "index";

        $this->run();
    }

    public function run()
    {
        $path = 'app\controllers\\' . $this->route['controller'] . 'Controller';

        if (class_exists($path)) {
            $action = $this->route['action'] . 'Action';
            if (method_exists($path, $action)) {
                $controller = new $path($this->route);
                $controller->$action();
            } else {
                echo 'Не найден экшен: ' . $action;
                View::errorCode(404);
            }
        } else {
            echo 'Не найден контроллер: ' . $path;
            View::errorCode(404);
        }
    }
}
