package com.project.todo_api.state;

import com.project.todo_api.models.Task;

public abstract class TaskState {
  public abstract void applyState(Task task);
}
