package com.project.todo_api.dtos;

import java.util.Date;

import com.project.todo_api.enums.TaskPriority;
import com.project.todo_api.enums.TaskStatus;

public record DtoCreateTask(
  String title,
  String description,
  TaskStatus status,
  TaskPriority priority,
  Date creationDate,
  Date endDate
) {

}
