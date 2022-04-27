<?php

namespace app\core;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class Router {

    protected $route = [];

    public function __construct() {
        $this->setRoute();
        $this->run();
    }

    public function run() {
        $action = $this->route['action'] . '_Action';
        if (method_exists($this->route['controller_file'], $action)) {
            $controller = new  $this->route['controller_file']($this->route);
            $controller->$action();
        } else {
            echo "<script>alert(\"Не найден экшен: $action\");</script>";
            View::errorCode(404);
        }
    }

    public function isPageExistsForUser($page, $user) {
        $pages = require "app/{$user}/lib/route.php";
        return isset($pages[$page]) ? true : false;
    }

    public function setRoute() {
        $this->route['controller'] = isset($_REQUEST["controller"]) ? $_REQUEST["controller"] : "Main";
        $this->route['action'] = isset($_REQUEST['action']) ? $_REQUEST['action'] : "show";

        $user = $this->WhoYOu();

        if ($this->route['controller'] == 'Account') {
            unset($_SESSION['user']);
            $user = '_share';
        } else
            if (!$this->isPageExistsForUser($this->route['controller'], $user))
            View::redirect("/website/Main/show");

        $prefix_controller = file_exists("app\\{$user}\\controllers\\{$this->route['controller']}.php") ?               $user : '_share';
        $prefix_model = file_exists("app\\{$user}\\models\\{$this->route['controller']}.php") ?                         $user : '_share';
        $prefix_view = file_exists("app\\{$user}\\views\\{$this->route['controller']}\\{$this->route['action']}.php") ? $user : '_share';

        $this->route['user'] = $user;
        $this->route['controller_file'] = "app\\{$prefix_controller}\\controllers\\{$this->route['controller']}";
        $this->route['model_file'] = "app\\{$prefix_model}\\models\\{$this->route['controller']}";
        $this->route['view_file'] = "app\\{$prefix_view}\\views\\{$this->route['controller']}\\{$this->route['action']}.php";
    }

    public function WhoYOu() {
        if (isset($_SESSION['user']['isAdmin']))
            return '_admin';
        elseif (isset($_SESSION['user']))
            return '_user';
        else
            return '_share';
    }
}
