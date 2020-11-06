<?php

namespace App;

use App\Exceptions\NotFoundException;

class Router
{
    private $routes = [];

    public function get($path, $callback)
    {
        $this->routes[] = new Route('get', $path, $callback);
    }

    public function post($path, $callback)
    {
        $this->routes[] = new Route('post', $path, $callback);
    }

    public function dispatch()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $uri = '/' . trim(parse_url(strtolower($_SERVER['REQUEST_URI']), PHP_URL_PATH), '/');

        foreach ($this->routes as $route)
        {
            if ($route->match($method, $uri)) {
                return $route->run($uri);
            }
        }

        throw new NotFoundException('Page not exist.');
    }
}
