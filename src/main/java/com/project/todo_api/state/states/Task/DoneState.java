package com.project.todo_api.state.states.Task;

import com.project.todo_api.enums.TaskStatus;
import com.project.todo_api.models.Task;
import com.project.todo_api.state.TaskState;
import org.springframework.stereotype.Component;

@Component("done")
public class DoneState extends TaskState {

  @Override
  public void applyState(Task task) {
    task.setState(this);
    task.setStatus(TaskStatus.DONE);
  }
}
