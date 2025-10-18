<?php

use Core\Router\Web\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

global $routes;
