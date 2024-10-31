<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repositories\IUserRepository;
use App\Services\UserService;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

  class UserTest extends TestCase{

    #[Test]
    public function mustCreateUser(){
      //Arrange
      $name = "Davi";
      $email = "davi@gmail.com";
      $password = "davi1234";

      //Act
      $user = new User(
        name: $name,
        email: $email,
        password: $password
      );

      $userRepository = $this->createMock(IUserRepository::class);
      
      $userRepository
        ->method('create')
        ->with($user)
        ->willReturn(new User(
          id:1,
          name: "Davi",
          email: "davi@gmail.com",
          password: "davi1234"
        ));

      $userService = new UserService($userRepository);
      
      //Assert
      $this->assertEquals($user, $userService->create([
        'name' => $name,
        'email'=> $email,
        'password' => $password
      ]));
    }
  }