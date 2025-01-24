package com.project.todo_api.dtos;

public record DtoCreateUser(
  String name,
  String email,
  String password
) {

}
