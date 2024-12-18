<?php

namespace Core\Exceptions;

use Core\Enums\HttpStatus;

class ValidationException extends \Exception{
  protected HttpStatus $status;

  public function __construct(HttpStatus $status = HttpStatus::BAD_REQUEST, string $message = ''){
    parent::__construct($message);
    $this->status = $status;
  }

  public function getStatus(): HttpStatus{
    return $this->status;
  }
}