package com.project.todo_api.state.states.Task;

import com.project.todo_api.enums.TaskStatus;
import com.project.todo_api.models.Task;
import com.project.todo_api.state.TaskState;

public class TodoState implements TaskState {
  
  @Override
  public void next(Task task) {
    task.setState(new DoingState());
    task.setStatus(TaskStatus.DOING);
  }

  @Override
  public void previous(Task task) throws Exception {
    throw new Exception("To-Do is the initial state.");
  }
}
