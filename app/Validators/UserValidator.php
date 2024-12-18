<?php

namespace App\Validators;

use App\DTOs\UserDTO;
use Core\Exceptions\ValidationException;

/**
 * @implements IValidator<UserDTO>
 */
class UserValidator implements IValidator{
  /**
   * @param UserDTO $dto
   * @return void
   * @throws ValidationException
   */
  public static function validate(object $dto): void{
    if (!$dto instanceof UserDTO) {
      throw new \InvalidArgumentException("Invalid DTO provided.");
    }

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
