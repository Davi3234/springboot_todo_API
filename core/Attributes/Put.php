<?php
namespace Core\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Put {
    public function __construct(public string $path) {}
}
