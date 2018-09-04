<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 16/08/2018
 * Time: 22:45
 */

namespace App\Core;

/** @noinspection PhpInconsistentReturnPointsInspection */

use Exception;

class Router
{
    public $routes = [
        'GET'  => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;
        /** @noinspection PhpIncludeInspection */
        require $file;
        return $router;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            try {
                return $this->callAction(
                    ...explode('@', $this->routes[$requestType][$uri])
                );
            } catch (Exception $e) {
                echo 'No Route defined for the URI';
            }
        }
    }

    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            /** @noinspection PhpUnhandledExceptionInspection */
            throw new Exception(
                "{$controller} does not respond to the {$action} action"
            );
        }
        return $controller->$action();
    }

} // end of class