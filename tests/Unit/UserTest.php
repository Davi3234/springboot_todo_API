<?php

namespace Tests\Unit;

use App\DTOs\UserDTO;
use App\Models\User;
use App\Repositories\IUserRepository;
use App\Services\UserService;
use Core\Exceptions\ValidationException;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

  #[Test]
  public function mustCreateUser(){
    // Arrange
    $dto = new UserDTO(
      id: 1,
      name: "Davi",
      email: "davi@gmail.com",
      password: "davi1234"
    );

    $mockUser = new User(
      id: 1,
      name: $dto->name,
      email: $dto->email,
      password: $dto->password
    );

    $userRepository = $this->createStub(IUserRepository::class);

    $userRepository
      ->method('create')
      ->with($dto)
      ->willReturn($mockUser);

    $userService = new UserService($userRepository);

    // Act
    $result = $userService->create($dto);

    // Assert
    $this->assertEquals($mockUser, $result);
  }

  #[Test]
  public function mustThrowExceptToInvalidName(){
    $this->expectException(ValidationException::class);

    // Arrange
    $dto = new UserDTO(
      id: 1,
      name: "",
      email: "davi@gmail.com",
      password: "davi1234"
    );

    $mockUser = new User(
      id: 1,
      name: $dto->name,
      email: $dto->email,
      password: $dto->password
    );

    $userRepository = $this->createStub(IUserRepository::class);

    $userRepository
      ->method('create')
      ->with($dto)
      ->willReturn($mockUser);

    $userService = new UserService($userRepository);

    // Act
    // Must throw exception 
    $result = $userService->create($dto);
  }
}