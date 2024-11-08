<?php
namespace Core\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Get {
    public function __construct(public string $path) {}
}
