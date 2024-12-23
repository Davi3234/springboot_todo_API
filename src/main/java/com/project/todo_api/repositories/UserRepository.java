package com.project.todo_api.repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import com.project.todo_api.models.User;

public interface UserRepository extends JpaRepository<User, Long>{
  
}
