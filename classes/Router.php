<?php

class Router {
    private $routes = [];

    public function add($path, $callback) {
        $this->routes[$path] = $callback;
    }

    public function dispatch($url) {
        $url = parse_url($url, PHP_URL_PATH);
        $url = str_replace(parse_url(BASE_URL, PHP_URL_PATH), '', $url);
        $url = trim($url, '/');

        if (isset($this->routes[$url])) {
            $callback = $this->routes[$url];
            if (is_array($callback)) {
                $controllerName = $callback[0];
                $methodName = $callback[1];
                $controller = new $controllerName();
                $controller->$methodName();
            } else {
                call_user_func($callback);
            }
        } else {
            // Handle 404 or pass through to physical files for now
            // To keep existing structure working, we won't block non-routed requests
        }
    }
}
