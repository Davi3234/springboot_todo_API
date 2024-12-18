<?php

namespace App\Services;

use App\DTOs\UserDTO;
use App\Models\User;
use App\Repositories\IUserRepository;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
class UserService{
  private IUserRepository $userRepository;

  public function __construct(IUserRepository $userRepository = new UserRepository){
    $this->userRepository = $userRepository;
  }

  public function create(UserDTO $userDTO){
    UserValidator::validate($userDTO);

    return new User(
      id: $userDTO->id,
      name: $userDTO->name,
      email: $userDTO->email,
      password: $userDTO->password
    );
  }
}