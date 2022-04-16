<?php

namespace app\core;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class Router {

    protected $route = [];
    public $admin_path = '';
    public $admin_class_prefix = '';

    public function __construct() {
        $this->route['controller'] = isset($_REQUEST["controller"]) ? $_REQUEST["controller"] : "Main";
        $this->route['action'] = isset($_REQUEST['action']) ? $_REQUEST['action'] : "show";

        if ($this->route['controller'] == 'Account') {
            if (isset($_SESSION['user']))
                unset($_SESSION['user']);

            if (isset($_SESSION['isAdmin']))
                unset($_SESSION['isAdmin']);
        }

        if (isset($_SESSION['isAdmin'])) {
            $this->admin_path = 'admin\\';
            $this->admin_class_prefix = 'Admin';
        } else {
            $this->admin_path = '';
            $this->admin_class_prefix = '';
        }

        $this->run();
    }

    public function run() {
        $path = "app\\{$this->admin_path}controllers\\{$this->admin_class_prefix}{$this->route['controller']}";

        if (class_exists($path)) {
            $action = $this->route['action'] . '_Action';
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
