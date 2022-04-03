<?php

namespace app\core;

class View
{
    public $path;
    public $route;

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $vars = [], $err = [], $layout = 'default')
    {
        $path = 'app/views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            $layoutPath = 'app/views/layouts/' . $layout . '.php';
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

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'app/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    public static function redirect($url)
    {
        header('locatoin: ' . $url);
        exit;
    }
}
