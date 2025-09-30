<?php

namespace core\Router;

class Router
{
    private $current_route;
    private $method_field;
    private $routes;
    private $params;

    public function __construct()
    {
        $this->current_route = explode('/', CURRENT_ROUTE);
        global $routes;
        $this->routes = $routes;
        $this->method_field = $this->methodField();
    }

    public function methodField()
    {
        $method_filed = strtolower($_SERVER['REQUEST_METHOD']);
        $method_filed = match($_POST['method']){
            'put' => 'put',
            'delete' => 'delete',
            default => 'post'
        };
        return $method_filed;
    }
}