<?php

namespace StudioVisual\Core;

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        if (!isset($_GET['url'])) {
            return;
        }

        $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

        $class = ucfirst($url[0]) . 'Controller';

        if (file_exists("../app/controllers/{$class}.php")) {
            $this->controller = $class;
            unset($url[0]);
        }

        $class = 'StudioVisual\Controllers\\' . $this->controller;
        $this->controller = new $class;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

}