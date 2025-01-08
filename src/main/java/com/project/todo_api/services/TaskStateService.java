package com.project.todo_api.services;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.project.todo_api.models.Task;
import com.project.todo_api.repositories.TaskRepository;
import com.project.todo_api.factories.TaskStateFactory;
import com.project.todo_api.state.TaskState;

@Service
public class TaskStateService {

  @Autowired
  private TaskRepository taskRepository;

  @Autowired
  private TaskStateFactory taskFactory;

  public Task changeState(Long taskId, String state) throws Exception {
    Task task = taskRepository.findById(taskId)
        .orElseThrow(() -> new IllegalArgumentException("Task not found"));

    TaskState newState = taskFactory.getState(state);

    newState.applyState(task);

    taskRepository.save(task);

    return task;
  }
}