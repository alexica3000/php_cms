<?php

namespace App;

class Route
{
    private $method;
    private $path;
    private $callback;

    public function __construct($method, $path, $callback)
    {
        $this->method = strtolower($method);
        $this->path = '/' . trim(strtolower($path), '/');
        $this->callback = $this->prepareCallback($callback);
    }

    private function prepareCallback($callback)
    {
        if (is_callable($callback)) {
            return $callback;
        }

        return function (...$params) use ($callback) {
            list($class, $method) = explode('@', $callback);
            return call_user_func_array([new $class, $method], $params);
        };

    }

    public function getPath()
    {
        return $this->path;
    }

    public function match($method, $uri): bool
    {
        return $this->method === $method && preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/', $uri);
    }

    public function run($uri)
    {
        $params = [];
        $segments = explode('/', $uri);
        $pathSegments = explode('/', $this->getPath());

        foreach ($pathSegments as $key => $segment) {
            if ($segment === '*') {
                $params[] = $segments[$key];
            }
        }

        return call_user_func_array($this->callback, $params);
    }
}
