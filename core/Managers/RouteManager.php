<?php

namespace Core\Managers;

use Core\Attributes\Controller;
use Core\Attributes\Get;
use ReflectionClass;

class RouteManager
{
  private array $routes = [];

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
      $prefix = $controllerAttr->newInstance()->prefix;

      foreach ($reflectionClass->getMethods() as $method) {
        $getAttr = $method->getAttributes(Get::class)[0] ?? null;
        if ($getAttr) {
          $path = $prefix . $getAttr->newInstance()->path;
          $this->routes['GET'][$path] = [$controllerClass, $method->getName()];
        }
      }
    }
  }

  public function getRoutes(): array
  {
    return $this->routes;
  }
}
