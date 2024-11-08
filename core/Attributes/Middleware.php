<?php
namespace Core\Attributes;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD)]
class Middleware {
    public function __construct(public string $middlewareClass) {}
}
