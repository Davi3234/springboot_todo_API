<?php
namespace Core;

use Core\Enums\HttpStatus;
use Core\Exceptions\ApiException;
use Core\Managers\CacheManager;
use Core\Managers\RouteManager;
use Core\Http\Request;
use Core\Http\Response;
use Core\Attributes\Middleware;

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
        try {
            $request = new Request();
            $method = $request->getMethod();
            $path = $request->getPath();

            if (isset($this->routes[$method][$path])) {
                [$controllerClass, $action] = $this->routes[$method][$path];
                $controller = new $controllerClass();

                $reflectionMethod = new \ReflectionMethod($controllerClass, $action);
                $middlewareAttr = $reflectionMethod->getAttributes(Middleware::class)[0] ?? null;

                if ($middlewareAttr) {
                    $middlewareClass = $middlewareAttr->newInstance()->middlewareClass;
                    $middleware = new $middlewareClass();

                    if (!$middleware->handle()) {
                        return;
                    }
                }

                return $controller->$action();
            }

            throw new ApiException(HttpStatus::NOT_FOUND, 'Route not found');
        } catch (ApiException $e) {
            (new Response())->status($e->getStatus())->json(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            (new Response())->status(HttpStatus::INTERNAL_SERVER_ERROR)->json(['error' => 'An unexpected error occurred']);
        }
    }
}
