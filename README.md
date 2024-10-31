# PHP-To-Do-App
This is a PHP Back-End To-Do App, applying SOLID, Design Pattern and TDD.

## The system Functional Requirements:
- FR01: The system must maintain Users.
- FR02: The system must autenticate Users.
- FR03: The system must maintain Tasks.
- FR04: The system must send emails when task change ended.

## The system Not Functional Requirements:
- NFR01: The system must be done in PHP.
- NFR02: The system must be develop Test-Driven Development (TDD).
- NFR03: The system must use JWT to autentication.

## The system Business Rules
- BR01: The user data are name, email and password.
- BR02: The task data are title, description, status, priority, creation date, and end date.
- BR03: The status task, can be to-do, doing or done.
- BR04: The priority level, can be low, medium or high.
- BR05: The user can change the status from task.
- BR06: The user can change the priority from task.
- BR07: The email must be send when the task status was changed to done or the end date arrives.
- BR08: The email must be send asynchronously.
- BR09: The end date of a task must be a future date at the time of creation or modification.
- BR10: The user must be notified if the task's end date is in less than 24 hours.
