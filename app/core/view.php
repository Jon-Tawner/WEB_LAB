<?php

namespace app\core;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class View {
    public $path;
    public $route;
    public $additional_path;

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
        $this->additional_path = $this->setAdditionalPath();
    }

    public function render($title, $vars = [], $err = [], $layout = 'layout') {
        $path = 'app/' . $this->additional_path . 'views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            $layoutPath = 'app/' . $this->additional_path . 'views/layouts/' . $layout . '.php';
            if (file_exists($layoutPath)) {
                require $layoutPath;
            } else {
                echo 'лейоут не найден: ' . $layoutPath;
                View::errorCode(404);
            }
        } else {
            echo 'Вид не найден: ' . $this->path;
            View::errorCode(404);
        }
    }

    public function setAdditionalPath() {
        if (isset($_SESSION['user']['isAdmin']))
            return '_admin\\';
        elseif (isset($_SESSION['user']))
            return '_user\\';

        return '';
    }

    public static function errorCode($code) {
        http_response_code($code);
        $path = 'app/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    public static function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
}
