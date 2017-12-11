<?php

namespace StudioVisual\Core;

class Controller
{

    public function model($model)
    {
        $class = "StudioVisual\Models\\$model";
        return new $class;
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

}