package com.project.todo_api.dtos;

import java.util.Date;

import com.project.todo_api.enums.TaskPriority;
import com.project.todo_api.enums.TaskStatus;

import lombok.Data;

@Data
public class TaskDTO {

  private Long id;
  private String title;
  private String description;
  private TaskStatus status;
  private TaskPriority priority;
  private Date creationDate;
  private Date endDate;

  public TaskDTO(){
    
  }

  public TaskDTO(Long id, String title, String description, TaskStatus status, TaskPriority priority, Date creationDate, Date endDate) {
    this.id = id;
    this.title = title;
    this.description = description;
    this.status = status;
    this.priority = priority;
    this.creationDate = creationDate;
    this.endDate = endDate;
  }

  public TaskDTO(String title, String description, TaskStatus status, TaskPriority priority, Date creationDate, Date endDate) {
    this.title = title;
    this.description = description;
    this.status = status;
    this.priority = priority;
    this.creationDate = creationDate;
    this.endDate = endDate;
  }
}