package com.project.todo_api.mappers;

import com.project.todo_api.dtos.TaskDTO;
import com.project.todo_api.models.Task;

public class TaskMapper {
  public static Task toEntity(TaskDTO taskDto){
    return new Task(
      taskDto.getTitle(),
      taskDto.getDescription(),
      taskDto.getStatus(),
      taskDto.getPriority(),
      taskDto.getCreationDate(),
      taskDto.getEndDate()
      );
  }
  public static TaskDTO toDTO(Task task){
    return new TaskDTO(
      task.getTitle(),
      task.getDescription(),
      task.getStatus(),
      task.getPriority(),
      task.getCreationDate(),
      task.getEndDate()
    );
  }
}
