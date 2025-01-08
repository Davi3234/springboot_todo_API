package com.project.todo_api.models;

import java.util.Date;

import com.project.todo_api.enums.Priority;
import com.project.todo_api.enums.Status;

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
  private Status status;
  private Priority priority;
  private Date creationDate;
  private Date endDate;

  public Task() {
  }

  public Task(String title, String description, Status status, Priority priority, Date creationDate, Date endDate) {
    this.title = title;
    this.description = description;
    this.status = status;
    this.priority = priority;
    this.creationDate = creationDate;
    this.endDate = endDate;
  }
}
