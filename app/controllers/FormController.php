<?php

namespace StudioVisual\Controllers;

use StudioVisual\Core\Controller;

class FormController extends Controller
{
    public function index()
    {
        $this->view('form/index', new static());
    }

    public function ajax(){
        header('Content-Type: application/json');
        echo json_encode(['nome' => 'Teste']);
    }
}