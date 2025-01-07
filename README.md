# SpringBoot To-Do API
This is a Spring Boot back-end To-Do API, applying SOLID principles, Design Patterns, Unit and Integration Tests.

## Requirements

### Functional Requirements
---
- FR01: The system must manage Users.
- FR02: The system must authenticate Users.
- FR03: The system must manage Tasks.
- FR04: The system must send emails when a task is marked as done.

### Non-Functional Requirements
---
- NFR01: The system must be implemented in Java 21 with Spring Boot.
- NFR02: The system must use JWT for authentication.
- NFR03: The system must be tested using JUnit.

### Business Rules
---
- BR01: User data includes name, email, and password.
- BR02: Task data includes title, description, status, priority, creation date, and end date.
- BR03: Task statuses can be "to-do", "doing", or "done".
- BR04: Task priority levels can be "low", "medium", or "high".
- BR05: Users can update the status of a task.
- BR06: Users can change the priority of a task.
- BR07: An email must be sent when the task's status is changed to "done" or when the end date is reached.
- BR08: The email must be sent asynchronously.
- BR09: The end date of a task must be in the future at the time of creation or modification.
- BR10: The user must be notified if a task's end date is less than 24 hours away.

## How to Run the Project

### Docker
1. Ensure Docker is installed on your machine. If you don’t have Docker installed, follow the instructions here: [https://www.docker.com/get-started/].
2. Navigate to the project directory and execute the following command in your terminal:
   ```bash
   docker-compose up --build -d
3. The project should now be running.
