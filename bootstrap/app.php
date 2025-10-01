<?php
use core\Router\Router;

require_once '../config/app.php';

require_once '../routes/web.php';
require_once '../routes/api.php';

$router = new Router();
$router->checkRoute();