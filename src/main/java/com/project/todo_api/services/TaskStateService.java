package com.project.todo_api.services;

import org.springframework.stereotype.Service;

import com.project.todo_api.models.Task;

@Service
public class TaskStateService {

  public void advanceToNextState(Task task) throws Exception {
    task.getState().next(task);
  }

  public void revertToPreviousState(Task task) throws Exception {
    task.getState().previous(task);
  }
}