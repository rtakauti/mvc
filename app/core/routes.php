<?php

use StudioVisual\Controllers\HomeController;
use StudioVisual\Controllers\ContactController;
use StudioVisual\Controllers\AnimalController;
use StudioVisual\Controllers\FormController;
use StudioVisual\Core\Route;

$route = new Route();

//$route->get('/', HomeController::class, 'index');
$route->get('home', HomeController::class, 'index');

$route->get('contact', ContactController::class, 'index');
$route->get('animal', AnimalController::class, 'name');

$route->get('form', FormController::class, 'index');
$route->post('form', FormController::class, 'ajax');


header("HTTP/1.1 404 Not found");
echo '404';