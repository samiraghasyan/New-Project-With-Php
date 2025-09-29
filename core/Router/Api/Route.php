<?php

namespace core\Router\Api;

class Route
{
    public static function get($route,$context)
    {
        $controller = $context[0];
        $method = $context[1];
        global $routes;
        $routes['get'][] = array(
            'route' => 'api/'.$route,
            'controller' => $controller,
            'method' => $method
        );
    }

    public static function post($route,$context)
    {
        $controller = $context[0];
        $method = $context[1];
        global $routes;
        $routes['post'][] = array(
            'route' => 'api/'.$route,
            'controller' => $controller,
            'method' => $method
        );
    }

    public static function put($route,$context)
    {
        $controller = $context[0];
        $method = $context[1];
        global $routes;
        $routes['put'][] = array(
            'route' => 'api/'.$route,
            'controller' => $controller,
            'method' => $method
        );
    }

    public static function delete($route,$context)
    {
        $controller = $context[0];
        $method = $context[1];
        global $routes;
        $routes['delete'][] = array(
            'route' => 'api/'.$route,
            'controller' => $controller,
            'method' => $method
        );
    }
}