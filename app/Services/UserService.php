<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\IUserRepository;
use App\Repositories\UserRepository;
class UserService{
  private IUserRepository $userRepository;

  public function __construct(IUserRepository $userRepository = new UserRepository){
    $this->userRepository = $userRepository;
  }

  public function create(array $args){
    return new User(
      name: $args['name'],
      email: $args['email'],
      password: $args['password']
    );
  }
}