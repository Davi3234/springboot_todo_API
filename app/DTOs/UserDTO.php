<?php
namespace App\DTOs;
class UserDTO{

  public function __construct(
    public readonly int $id = 0,
    public readonly string $name,
    public readonly string $email,
    public readonly string $password
) {}
}