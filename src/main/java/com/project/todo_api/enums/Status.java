package com.project.todo_api.enums;

public enum Status {
  TODO("TD"),
  DOING("DO"),
  DONE("DN");

  private final String value;

  Status(String value){
    this.value = value;
  }

  public String getValue(){
    return value;
  }
}
