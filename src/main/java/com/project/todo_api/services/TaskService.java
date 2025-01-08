package com.project.todo_api.services;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.project.todo_api.dtos.TaskDTO;
import com.project.todo_api.mappers.TaskMapper;
import com.project.todo_api.models.Task;
import com.project.todo_api.repositories.TaskRepository;

@Service
public class TaskService {
  @Autowired
  private TaskRepository repository;

  public List<Task> getAllTasks() {
    return repository.findAll();
  }

  public Optional<Task> getTaskById(Long id) {
    return repository.findById(id);
  }

  public Task createTask(TaskDTO taskDTO) {
    Task task = TaskMapper.toEntity(taskDTO);
    return repository.save(task);
  }

  public Task updateTask(Long id, TaskDTO taskDTO) {
    Task task = repository.findById(id)
        .orElseThrow(() -> new RuntimeException("Task not found"));

    task = TaskMapper.toEntity(taskDTO);
    return repository.save(task);
  }

  public void deleteTask(Long id) {
    repository.deleteById(id);
  }
}
