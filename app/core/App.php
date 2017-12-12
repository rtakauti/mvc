<?php

namespace StudioVisual\Core;

class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];
    protected $url = [];

    public function __construct()
    {
        if (isset($_GET['url'])) {
            $this->url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            $class = ucfirst($this->url[0]);
        }

        if (isset($class) && file_exists("../app/controllers/{$class}Controller.php")) {
            $this->controller = $class.'Controller';
            unset($this->url[0]);
        }

        $class = 'StudioVisual\Controllers\\'.$this->controller;
        $this->controller = new $class;

        if (isset($this->url[1]) && method_exists($this->controller, $this->url[1])) {
            $this->method = $this->url[1];
            unset($this->url[1]);
        }

        $this->params = $this->url ? array_values($this->url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

}