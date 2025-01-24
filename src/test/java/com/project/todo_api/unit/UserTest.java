package com.project.todo_api.unit;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.mockito.Mockito.when;

import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.mockito.InjectMocks;
import org.mockito.Mock;
import org.mockito.MockitoAnnotations;

import com.project.todo_api.dtos.DtoCreateUser;
import com.project.todo_api.models.User;
import com.project.todo_api.repositories.UserRepository;
import com.project.todo_api.services.UserService;

public class UserTest {

  @Mock
  private UserRepository userRepository;

  @InjectMocks
  private UserService userService;

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
    DtoCreateUser dtoCreateUser = new DtoCreateUser(name, email, password);
    User user = new User(dtoCreateUser);

    when(this.userRepository.save(user)).thenReturn(user);

    //Act
    User userReturn = this.userService.createUser(dtoCreateUser);

    //Assert
    assertEquals(userReturn, user);
  }
}
