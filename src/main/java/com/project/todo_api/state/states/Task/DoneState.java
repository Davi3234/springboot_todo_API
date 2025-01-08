package com.project.todo_api.state.states.Task;

import com.project.todo_api.enums.TaskStatus;
import com.project.todo_api.models.Task;
import com.project.todo_api.state.TaskState;

public class DoneState implements TaskState {
  @Override
  public void next(Task task) throws Exception{
    throw new Exception("Done is the final state");
  }

  @Override
  public void previous(Task task) {
    task.setState(new DoingState());
    task.setStatus(TaskStatus.DOING);
  }
}
