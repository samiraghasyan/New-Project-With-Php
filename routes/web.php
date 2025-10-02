<?php

use Core\Router\Web\Route;
use app\Controllers\Controller;

Route::get('/',[UserController::class,'index']);
global $routes;
