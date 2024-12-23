package com.project.todo_api.mappers;

import com.project.todo_api.dtos.UserDTO;
import com.project.todo_api.models.User;

public class UserMapper {
  public static User toEntity(UserDTO userDto){
    return new User(userDto.getName(), userDto.getEmail(), userDto.getPassword());
  }
  public static UserDTO toDTO(User user){
    return new UserDTO(user.getId(),user.getName(), user.getEmail(), user.getPassword());
  }
}
