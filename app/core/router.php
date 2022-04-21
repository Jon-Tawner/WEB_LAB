<?php

namespace app\core;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class Router {

    protected $route = [];

    public function __construct() {
        $this->route['controller'] = isset($_REQUEST["controller"]) ? $_REQUEST["controller"] : "Main";
        $this->route['action'] = isset($_REQUEST['action']) ? $_REQUEST['action'] : "show";

        if ($this->route['controller'] == 'Account') {
            if (isset($_SESSION['user']))
                unset($_SESSION['user']);
        } else
            if (!$this->isPageExistsForUser($this->route['controller']))
            View::redirect("/website/Main/show");

        $this->setUserPrefix();
        $this->route['controller_path'] = "app\\{$this->route['additional_path']}controllers\\{$this->route['controller']}";
        $this->route['model_path'] = "app\\{$this->route['additional_path']}models\\{$this->route['controller']}";

        $this->run();
    }

    public function run() {
        if (class_exists($this->route['controller_path'])) {
            $action = $this->route['action'] . '_Action';
            if (method_exists($this->route['controller_path'], $action)) {
                $controller = new $this->route['controller_path']($this->route);
                $controller->$action();
            } else {
                echo "<script>alert(\"Не найден экшен: $action\");</script>";
                View::errorCode(404);
            }
        } else {
            echo "<script>alert(\"Не найден контроллер: $this->route['controller_path']\");</script>";
            View::errorCode(404);
        }
    }

    public function isPageExistsForUser($page) {
        if (isset($_SESSION['user']['isAdmin']))
            $pages = require 'app/_admin/lib/route.php';
        elseif (isset($_SESSION['user']))
            $pages = require 'app/_user/lib/route.php';
        else
            $pages = require 'app/lib/route.php';

        if (isset($pages[$page]))
            return true;
        return false;
    }

    public function setUserPrefix() {
        if (isset($_SESSION['user']['isAdmin']))
            $this->route['additional_path'] = '_admin\\';
        elseif (isset($_SESSION['user']))
            $this->route['additional_path'] = '_user\\';
        else
            $this->route['additional_path'] = '';
    }
}
