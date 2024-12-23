package com.project.todo_api.models;


import jakarta.persistence.*;
import lombok.Data;

@Data
@Entity
@Table(name = "users")
public class User {
  
  @Id
  @GeneratedValue(strategy = GenerationType.IDENTITY)
  private Long id;

  private String name;
  private String email;
  private String password;

  public User(){}

  public User(String name, String email, String password){
    this.name = name;
    this.email = email;
    this.password = password;
  }
}


