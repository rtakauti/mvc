<?php

namespace StudioVisual\Core;

class Route
{
    private
        $verb,
        $route;

    public function __construct()
    {
        $this->verb = $_SERVER['REQUEST_METHOD'];
        $this->route = $_SERVER['REQUEST_URI'];
    }

    public function get($path, $controller, $method)
    {
        if ($this->verb !== 'GET') {
            return false;
        }

        if ('/' === $this->route) {
            (new \StudioVisual\Controllers\HomeController)->index();
        }

        if (strpos($this->route, $path) !== 0) {
            return false;
        }

        (new $controller)->{$method}(str_replace($path, '', $this->route));
    }


    public function post($path, $controller, $method)
    {
        if ($this->verb !== 'POST'|| strpos($this->route, $path) !== 0) {
            return false;
        }

        (new $controller)->{$method}(str_replace($path, '', $this->route));
    }

}