<?php

namespace App;

class Router
{
    private array $routes;

    public function get($page, $callback)
    {
        $action = trim($page, '/');
        $this->routes[$action] = $callback;
    }

    public function dispatch()
    {
        $action = trim($_SERVER['REQUEST_URI'], '/');

        if (!array_key_exists($action, $this->routes)) {
            echo 'Page not exist.';
            return;
        }

        $callback = $this->routes[$action];
        echo is_string($callback) ? $this->isStringCallback($callback) : call_user_func($callback);
    }

    private function isStringCallback($callback)
    {
        $arr = explode('@', $callback);
        $controller = new $arr[0];
        $method = $arr[1];
        return call_user_func([$controller, $method]);
    }
}
