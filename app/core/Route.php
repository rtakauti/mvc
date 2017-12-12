<?php

namespace StudioVisual\Core;

class Route
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $url = [];

    public function get($path, $controller, $method)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && '/'.explode('/',
                $_SERVER['REQUEST_URI'])[1] === $path && method_exists($object = new $controller, $method)) {
            call_user_func_array([$object, $method], $this->url ? array_values($this->url) : []);
        }
    }

    public function __construct()
    {
        if (isset($_GET['url'])) {
            $this->url = explode('/', filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            $class = ucfirst($this->url[0]);
        }

        if (isset($class) && file_exists("../app/controllers/{$class}Controller.php")) {
            $this->controller = $class . 'Controller';
            unset($this->url[0]);
        }

//        $class = 'StudioVisual\Controllers\\' . $this->controller;
//        $this->controller = new $class;
//
//        if (isset($this->url[1]) && method_exists($this->controller, $this->url[1])) {
//            $this->method = $this->url[1];
//            unset($this->url[1]);
//        }
//
//        call_user_func_array([$this->controller, $this->method], $this->url ? array_values($this->url) : []);
    }

}