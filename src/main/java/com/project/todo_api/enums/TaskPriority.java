package com.project.todo_api.enums;

public enum TaskPriority {
  LOW("L"),
  MEDIUM("M"),
  HIGH("H");

  private final String value;

  TaskPriority(String value){
    this.value = value;
  }

  public String getValue(){
    return value;
  }
}
