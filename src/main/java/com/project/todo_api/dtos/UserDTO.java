package com.project.todo_api.dtos;

import lombok.Data;

@Data
public class UserDTO {
  private Long id;
  private String name;
  private String email;
  private String password;

  public UserDTO(Long id, String name, String email, String password) {
    this.id = id;
    this.name = name;
    this.email = email;
    this.password = password;
  }

  public UserDTO(String name, String email, String password) {
    this.name = name;
    this.email = email;
    this.password = password;
  }
}
