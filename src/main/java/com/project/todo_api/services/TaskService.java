package com.project.todo_api.services;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.project.todo_api.dtos.DtoCreateTask;
import com.project.todo_api.models.Task;
import com.project.todo_api.repositories.TaskRepository;

@Service
public class TaskService {
  @Autowired
  private TaskRepository taskRepository;

  public List<Task> getAllTasks() {
    return taskRepository.findAll();
  }

  public Optional<Task> getTaskById(Long id) {
    return taskRepository.findById(id);
  }

  public Task createTask(DtoCreateTask dtoCreateTask) {
    return taskRepository.save(new Task(dtoCreateTask));
  }

  public Task updateTask(Long id, DtoCreateTask dtoCreateTask) {
    Task task = taskRepository.findById(id)
        .orElseThrow(() -> new RuntimeException("Task not found"));

    task = new Task(dtoCreateTask);

    return taskRepository.save(task);
  }

  public void deleteTask(Long id) {
    taskRepository.deleteById(id);
  }
}
