<?php

namespace Core\Managers;

use Core\Exceptions\RouterNotFoundException;
use Core\Attributes\Controller;
use Core\Attributes\Get;
use Core\Attributes\Post;
use Core\Attributes\Put;
use Core\Attributes\Delete;
use ReflectionClass;
use ReflectionMethod;

class RouteManager
{
  private array $routes = [];
  private static array $HTTP_METHODS_ATTRIBUTES = [
    Get::class => 'GET',
    Post::class => 'POST',
    Put::class => 'PUT',
    Delete::class => 'DELETE'
  ];

  public function __construct(array $controllers)
  {
    foreach ($controllers as $controllerClass) {
      $this->registerController($controllerClass);
    }
  }

  private function registerController(string $controllerClass): void
  {
    $reflectionClass = new ReflectionClass($controllerClass);
    $controllerAttr = $reflectionClass->getAttributes(Controller::class)[0] ?? null;

    if ($controllerAttr) {
      $prefix = $controllerAttr->newInstance()->getPrefix();
      foreach ($reflectionClass->getMethods() as $method) {
        $this->registerRoutesForMethod($method, $controllerClass, $prefix);
      }
    }
  }

  private function registerRoutesForMethod(ReflectionMethod $method, string $controllerClass, string $prefix): void
  {
    foreach (self::$HTTP_METHODS_ATTRIBUTES as $attributeClass => $httpMethod) {
      $attributes = $method->getAttributes($attributeClass);
      foreach ($attributes as $attribute) {
        $path = $prefix . $attribute->newInstance()->getEndpoint();
        $this->routes[$httpMethod][$path][] = [$controllerClass, $method->getName()];
      }
    }
  }

  public function resolveRequest(string $httpMethod, string $uri)
  {
    $routes = $this->routes[$httpMethod] ?? [];
    foreach ($routes as $path => $handlers) {
      if ($this->matchUri($path, $uri)) {
        return $handlers;
      }
    }
    throw new RouterNotFoundException("Route for \"$httpMethod $uri\" not found.");
  }

  private function matchUri(string $routePath, string $requestUri): bool
  {
    // Aqui você pode implementar a lógica para combinar parâmetros dinâmicos no URI.
    return $routePath === $requestUri;
  }

  public function getRoutes(): array
  {
    return $this->routes;
  }
}
