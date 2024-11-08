<?php

namespace Core\Exceptions;

use Core\Enums\HttpStatus;
use Exception;

class RouterNotFoundException extends ApiException
{
  
  public function __construct(string $message = '')
  {
    parent::__construct(HttpStatus::NOT_FOUND, $message);
  }

  public function getStatus(): HttpStatus
  {
    return $this->status;
  }
}
