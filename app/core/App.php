<?php
// Router sederhana: /controller/method/param1/param2
class App
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? explode('/', filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL)) : [];

        $controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'HomeController';
        $file = __DIR__ . '/../controllers/' . $controllerName . '.php';

        if (!file_exists($file)) {
            http_response_code(404);
            die('404 - Halaman tidak ditemukan');
        }

        require_once $file;
        $controller = new $controllerName();

        $method = $url[1] ?? 'index';
        if (!method_exists($controller, $method)) {
            http_response_code(404);
            die('404 - Method tidak ditemukan');
        }

        call_user_func_array([$controller, $method], array_slice($url, 2));
    }
}
