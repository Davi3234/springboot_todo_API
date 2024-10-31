<?php

namespace App\Models;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

  #[Entity]
  class User{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;
    #[Column]
    private string $name;
    #[Column]
    private string $email;
    #[Column]
    private string $password;

    public function __construct(string $name, string $email, string $password, int $id = 0){
      $this->id = $id;
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
    }
    public function getId(){
      return $this->id;
    }
    public function getName(){
      return $this->name;
    }
    public function getEmail(){
      return $this->email;
    }
    public function getPassword(){
      return $this->password;
    }
    public function setName($name){
      $this->name = $name;
    }
    public function setEmail($email){
      $this->email = $email;
    }
    public function setPassword($password){
      $this->password = $password;
    }
  }
