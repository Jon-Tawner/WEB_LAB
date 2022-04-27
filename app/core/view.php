<?php

namespace app\core;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class View {
    public $route;
    public $layout = 'layout';

    public function __construct($route) {
        $this->route = $route;
    }

    public function render($title, $vars = [], $err = []) {
        if (file_exists($this->route['view_file'])) {
            ob_start();
            require $this->route['view_file'];
            $content = ob_get_clean();

            $layoutPath = "app\\{$this->route['user']}\\views\\layouts\\{$this->layout}.php";
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


    public static function errorCode($code) {
        http_response_code($code);
        $path = 'app/_share/views/errors/' . $code . '.php';
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
