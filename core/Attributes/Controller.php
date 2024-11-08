<?php
namespace Core\Attributes;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Controller {
    public function __construct(public string $prefix) {}
}
