<?php
namespace Core\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Delete {
    public function __construct(public string $path) {}
}
