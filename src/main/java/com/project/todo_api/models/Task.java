package com.project.todo_api.models;

import java.util.Date;

import com.project.todo_api.enums.TaskPriority;
import com.project.todo_api.enums.TaskStatus;
import com.project.todo_api.state.TaskState;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import lombok.Data;

@Data
@Entity
@Table(name = "tasks")
public class Task {
  @Id
  @GeneratedValue(strategy = GenerationType.IDENTITY)
  private Long id;

  private String title;
  private String description;
  private TaskStatus status;
  private TaskPriority priority;
  private Date creationDate;
  private Date endDate;

  private TaskState state;

  public Task() {
    this.status = TaskStatus.TODO;
    this.state = this.status.toTaskState();
  }

  public Task(String title, String description, TaskStatus status, TaskPriority priority, Date creationDate,
      Date endDate) {
    this.title = title;
    this.description = description;
    this.status = status;
    this.priority = priority;
    this.creationDate = creationDate;
    this.endDate = endDate;
    this.state = this.status.toTaskState();
  }
}
