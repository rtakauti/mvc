<?php

namespace StudioVisual\Core;

class Route
{
    protected $url = [];

    public function get($path, $controller, $method)
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $class = '/'.$url[1];
        unset($url[0]);
        unset($url[1]);
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $class === $path && method_exists($object = new $controller, $method)) {
            call_user_func_array([$object, $method], $url ? array_values($url) : []);
        }
    }

}