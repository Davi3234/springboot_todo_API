<?php
namespace App\Repositories;

use App\Models\User;
use Repository;

class UserRepository implements IUserRepository{

  public function create(User $user): User{
    return $user;
  }
  public function update(User $user){

  }
  public function delete(int $id){

  }
  public function findOne(int $id){

  }
  public function findAll(){

  }
}

$userRepository = new UserRepository();

$userRepository->create(new User("","",""));