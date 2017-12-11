<?php

namespace StudioVisual\Core;

class Controller
{

    private $view;


    public function model($model)
    {
        $class = "StudioVisual\Models\\$model";
        return new $class;
    }

    public function view($view, $data = [])
    {
        $this->view = new View($view, $data);
        $this->view->show();
    }

}