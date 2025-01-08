package com.project.todo_api.state.states.Task;

import com.project.todo_api.enums.TaskStatus;
import com.project.todo_api.models.Task;
import com.project.todo_api.state.TaskState;

public class DoingState implements TaskState {
  @Override
  public void next(Task task) {
    task.setState(new DoneState());
    task.setStatus(TaskStatus.DONE);
  }

  @Override
  public void previous(Task task) {
    task.setState(new TodoState());
    task.setStatus(TaskStatus.TODO);
  }
}
