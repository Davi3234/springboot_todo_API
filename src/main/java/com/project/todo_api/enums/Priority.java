package com.project.todo_api.enums;

public enum Priority {
  LOW("L"),
  MEDIUM("M"),
  HIGHT("H");

  private final String value;

  Priority(String value){
    this.value = value;
  }

  public String getValue(){
    return value;
  }
}
