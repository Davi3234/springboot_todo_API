<?php

namespace Core\Exceptions;

use Core\Enums\HttpStatus;
use Exception;

class ApiException extends Exception
{
  private HttpStatus $status;

  public function __construct(HttpStatus $status, string $message = '')
  {
    parent::__construct($message);
    $this->status = $status;
  }

  public function getStatus(): HttpStatus
  {
    return $this->status;
  }
}
