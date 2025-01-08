package com.project.todo_api.enums;

import com.project.todo_api.state.TaskState;
import com.project.todo_api.state.states.Task.DoingState;
import com.project.todo_api.state.states.Task.DoneState;
import com.project.todo_api.state.states.Task.TodoState;

public enum TaskStatus {
  TODO("TD"){
    @Override
    public TaskState toTaskState(){
      return new TodoState();
    }
  },
  DOING("DO"){
    @Override
    public TaskState toTaskState(){
      return new DoingState();
    }
  },
  DONE("DN"){
    @Override
    public TaskState toTaskState(){
      return new DoneState();
    }
  };

  private final String value;

  TaskStatus(String value){
    this.value = value;
  }

  public abstract TaskState toTaskState();

  public String getValue(){
    return value;
  }
}
