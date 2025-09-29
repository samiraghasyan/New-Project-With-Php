<?php


const APP_NAME = 'MY_MVC';
define('BASE_URL', 'https://' .$_SERVER['HTTP_HOST']);
define('BASE_DIR',realpath(__DIR__.'/../'));

$current_route = explode('?', $_SERVER['REQUEST_URI'])[0];
$current_route = substr('/',1);

define('CURRENT_ROUTE', $current_route);