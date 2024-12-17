<?php

namespace App\Exceptions;

use Core\Enums\HttpStatus;
use Exception;

class ValidationException extends Exception{
  protected HttpStatus $status;

  public function __construct(HttpStatus $status = HttpStatus::BAD_REQUEST, string $message = ''){
    parent::__construct($message);
    $this->status = $status;
  }

  public function getStatus(): HttpStatus{
    return $this->status;
  }
}