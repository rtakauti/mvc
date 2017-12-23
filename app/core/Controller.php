<?php

namespace StudioVisual\Core;


class Controller
{

    public function model($model): Model
    {
        $class = "StudioVisual\Models\\$model";
        return new $class;
    }

    public function view($view, $data = [])
    {
        (new View($view, $data))->show();
    }

}