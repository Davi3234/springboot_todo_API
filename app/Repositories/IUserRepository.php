<?php
namespace App\Repositories;

use App\Models\User;

interface IUserRepository{
  public function create(User $user): User;
  public function update(User $user);
  public function delete(int $id);
  public function findOne(int $id);
  public function findAll();
}
