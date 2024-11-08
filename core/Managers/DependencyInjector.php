<?php

use Core\Attributes\Autowired;
class DependencyInjector
{
  public function injectDependencies(object $object)
  {
    $reflectionClass = new ReflectionClass($object);
    foreach ($reflectionClass->getProperties() as $property) {
      $attributes = $property->getAttributes(Autowired::class);
      if (count($attributes) > 0) {
        $propertyType = $property->getType();
        if ($propertyType && !$propertyType->isBuiltin()) {
          $className = $propertyType->getName();
          $dependency = new $className();
          $property->setAccessible(true);
          $property->setValue($object, $dependency);
        }
      }
    }
  }
}
