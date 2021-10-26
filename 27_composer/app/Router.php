<?php

namespace Shop;

class Router
{
    private array $routes;
    private string $controller = 'IndexController';
    private string $method = 'error404';

    public function __construct(array $routes)
    {
        $this->routes = $routes;

        if (array_key_exists($this->getUri(), $this->routes)) {
            [$this->controller, $this->method] = explode('@', $this->routes[$this->getUri()]);
        }
    }

    private function getUri(): string
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}