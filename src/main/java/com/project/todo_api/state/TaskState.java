package com.project.todo_api.state;

import com.project.todo_api.models.Task;

public interface TaskState {
  void next(Task task) throws Exception;
  void previous(Task task) throws Exception;
}
