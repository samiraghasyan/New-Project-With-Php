<?php

use Core\Router\Web\Route;
use app\Controllers\Controller;

Route::get('/user',[UserController::class,'index']);
Route::post('/user',[UserController::class,'create']);
global $routes;