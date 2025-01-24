package com.project.todo_api.models;

import com.project.todo_api.dtos.DtoCreateUser;

import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Entity
@Table(name = "users")
@NoArgsConstructor
@AllArgsConstructor
public class User {

  @Id
  @GeneratedValue(strategy = GenerationType.IDENTITY)
  private Long id;

  private String name;
  private String email;
  private String password;

  public User(DtoCreateUser dtoCreateUser) {
    this.name = dtoCreateUser.name();
    this.email = dtoCreateUser.email();
    this.password = dtoCreateUser.password();
  }
}
