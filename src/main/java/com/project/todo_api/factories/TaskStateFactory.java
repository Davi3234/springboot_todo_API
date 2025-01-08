package com.project.todo_api.factories;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.project.todo_api.state.TaskState;

import java.util.Map;

@Service
public class TaskStateFactory {

  @Autowired
  private Map<String, TaskState> taskStateMap;

  public TaskState getState(String state) {
    TaskState taskState = taskStateMap.get(state.toLowerCase());
    if (taskState == null) {
      throw new IllegalArgumentException("Invalid state: " + state);
    }
    return taskState;
  }
}
