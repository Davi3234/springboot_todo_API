<?php
namespace Core\Attributes;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Autowired {
    public function __construct(public string $prefix) {}
}
