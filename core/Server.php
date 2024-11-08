<?php
namespace Core;

use Core\Managers\CacheManager;
use Core\Managers\RouteManager;

class Server {
    private array $routes;

    public function __construct(array $controllers) {
        $this->routes = CacheManager::load() ?? $this->registerRoutes($controllers);
    }

    private function registerRoutes(array $controllers): array {
        $routeManager = new RouteManager($controllers);
        $routes = $routeManager->getRoutes();
        CacheManager::save($routes);
        return $routes;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$method][$uri])) {
            [$controller, $action] = $this->routes[$method][$uri];
            $instance = new $controller();
            return $instance->$action();
        }

        http_response_code(404);
        echo json_encode(['error' => 'Route not found']);
    }
}
