<?php

namespace Core\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class RouterMap {

  private readonly string $endpoint;

  public function __construct(
    private readonly string $method,
    string $endpoint = ''
  ) {
    $endpoint = trim($endpoint);

    if ($endpoint == '/') {
      $endpoint = '';
    }

    $this->endpoint = $endpoint;
  }

  public function getMethod() {
    return $this->method;
  }

  public function getEndpoint() {
    return $this->endpoint;
  }
}