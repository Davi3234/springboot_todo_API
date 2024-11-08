<?php

namespace Core\Attributes;

use Attribute;
use Core\Enums\HttpMethod;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Post extends RouterMap {

  public function __construct(string $endpoint = '') {
    parent::__construct(HttpMethod::POST->value, $endpoint);
  }
}