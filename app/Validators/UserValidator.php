<?php

use App\DTOs\UserDTO;
use App\Exceptions\ValidationException;
class UserValidator implements IValidator
{
  public static function validate(UserDTO $dto): void{
    if (empty($dto->name)) {
      throw new ValidationException(message: "Name is required.");
    }

    if (!filter_var($dto->email, FILTER_VALIDATE_EMAIL)) {
      throw new ValidationException(message: "Invalid email format.");
    }

    if (strlen($dto->password) < 6) {
      throw new ValidationException(message: "Password must be at least 6 characters long.");
    }
  }

}