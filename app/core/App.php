<?php

namespace StudioVisual\Core;

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        $class = ucfirst($url[0]);

        if (file_exists("../app/controllers/{$class}Controller.php")) {
            $this->controller = $class;
            unset($url[0]);
        }

        $class = "StudioVisual\Controllers\\{$this->controller}Controller";
        $this->controller = new $class;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}