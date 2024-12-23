package com.project.todo_api.services;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.project.todo_api.dtos.UserDTO;
import com.project.todo_api.mappers.UserMapper;
import com.project.todo_api.models.User;
import com.project.todo_api.repositories.UserRepository;

@Service
public class UserService {

  @Autowired
  private UserRepository repository;

  @Autowired
  private UserMapper userMapper;

  public List<User> getAllUsers() {
    return repository.findAll();
  }

  public Optional<User> getUserById(Long id) {
    return repository.findById(id);
  }

  public User createUser(UserDTO userDTO) {
        User user = userMapper.toEntity(userDTO);
        return repository.save(user);
    }

  public User updateUser(Long id, UserDTO userDTO) {
    User user = repository.findById(id)
        .orElseThrow(() -> new RuntimeException("User not found"));
        
    user = userMapper.toEntity(userDTO);
    return repository.save(user);
  }

  public void deleteUser(Long id) {
    repository.deleteById(id);
  }
}
