package com.project.todo_api.models;

import java.util.Date;

import com.project.todo_api.dtos.DtoCreateTask;
import com.project.todo_api.enums.TaskPriority;
import com.project.todo_api.enums.TaskStatus;
import com.project.todo_api.state.TaskState;

import jakarta.persistence.Entity;
import jakarta.persistence.EnumType;
import jakarta.persistence.Enumerated;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import jakarta.persistence.Transient;
import lombok.AllArgsConstructor;
import lombok.Data;

@Entity
@Table(name = "tasks")
@AllArgsConstructor
@Data
public class Task {
  @Id
  @GeneratedValue(strategy = GenerationType.IDENTITY)
  private Long id;

  private String title;
  private String description;
  @Enumerated(EnumType.STRING)
  private TaskStatus status;
  @Enumerated(EnumType.STRING)
  private TaskPriority priority;
  private Date creationDate;
  private Date endDate;

  @Transient
  private TaskState state;

  public Task() {
    this.status = TaskStatus.TODO;
    this.state = this.status.toTaskState();
  }

  public Task(DtoCreateTask dtoCreateTask){
    this.title = dtoCreateTask.title();
    this.description = dtoCreateTask.description();
    this.status = dtoCreateTask.status();
    this.priority = dtoCreateTask.priority();
    this.creationDate = dtoCreateTask.creationDate();
    this.endDate = dtoCreateTask.endDate();
    this.state = this.status.toTaskState();
  }
}
