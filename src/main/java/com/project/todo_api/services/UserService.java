package com.project.todo_api.services;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.project.todo_api.dtos.DtoCreateUser;
import com.project.todo_api.models.User;
import com.project.todo_api.repositories.UserRepository;

@Service
public class UserService {

  @Autowired
  private UserRepository userRepository;

  public List<User> getAllUsers() {
    return userRepository.findAll();
  }

  public Optional<User> getUserById(Long id) {
    return userRepository.findById(id);
  }

  public User createUser(DtoCreateUser dtoCreateUser) {
    return userRepository.save(new User(dtoCreateUser));
  }

  public User updateUser(Long id, DtoCreateUser dtoCreateUser) {
    User user = userRepository.findById(id)
        .orElseThrow(() -> new RuntimeException("User not found"));

    user = new User(dtoCreateUser);

    return userRepository.save(user);
  }

  public void deleteUser(Long id) {
    userRepository.deleteById(id);
  }
}
