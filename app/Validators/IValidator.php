<?php

use App\DTOs\UserDTO;
interface IValidator{
  public static function validate(UserDTO $dto): void;
}