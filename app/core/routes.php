<?php

use StudioVisual\Controllers\HomeController;
use StudioVisual\Controllers\ContactController;
use StudioVisual\Core\Route;

$route = new Route();

$route->get('/', HomeController::class, 'index');
$route->get('/home', HomeController::class, 'index');

$route->get('/contact', ContactController::class, 'index');

