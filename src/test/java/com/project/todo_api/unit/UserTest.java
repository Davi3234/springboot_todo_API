package com.project.todo_api.unit;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.mockito.Mockito.when;

import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.mockito.InjectMocks;
import org.mockito.Mock;
import org.mockito.MockitoAnnotations;

import com.project.todo_api.dtos.UserDTO;
import com.project.todo_api.mappers.UserMapper;
import com.project.todo_api.models.User;
import com.project.todo_api.repositories.UserRepository;
import com.project.todo_api.services.UserService;

public class UserTest {

  @Mock
  private UserRepository userRepository;

  private UserMapper userMapper;

  @InjectMocks
  private UserService userService;

  private UserDTO userDTO;
  private User user;

  @BeforeEach
  public void setUp() {
    MockitoAnnotations.openMocks(this);
  }

  @Test
  public void shouldCreateUser(){
    //Arrange
    String name = "Davi";
    String email = "davi@example.com";
    String password = "Password123!";
    User user = new User(name, email, password);
    this.userDTO = new UserDTO(1L, name, email, password);
    this.user = this.userMapper.toEntity(this.userDTO);
    when(this.userRepository.save(this.user)).thenReturn(this.user);

    //Act
    User userReturn = this.userService.createUser(this.userDTO);

    //Assert
    assertEquals(userReturn, this.user);
  }
}
