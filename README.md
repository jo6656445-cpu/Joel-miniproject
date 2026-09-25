# Personal Task Manager

## Project Information

Project Code:WST21-PM-2026-TTH

Student Name:Ortega,Joel B.

Course & Year: BSIT 3
 
Database Used: MySQL

---

## Project Description

Personal Task Manager is a Laravel web application that allows users to manage their personal tasks.

The system allows users to create, view, edit, delete, and update the status of tasks.

---

## Technologies Used

- Laravel
- PHP
- MySQL
- Blade
- HTML
- CSS

---

## Features

### Add Task
Users can add a new task with:

- Task Name
- Description
- Status
- Due Date

### View Tasks
Users can view all saved tasks in a table.

### Edit Task
Users can edit existing task information.

### Delete Task
Users can delete tasks that are no longer needed.

### Update Status
Users can change the task status between:

- Pending
- Completed

---

## Database

The system uses a MySQL database.

### Tasks Table

| Field | Description |
|---|---|
| id | Task ID |
| task_name | Name of the task |
| description | Task details |
| status | Pending or Completed |
| due_date | Task deadline |

---

## Laravel Structure

The project follows:

**Routes → Controller → Model → Database → Blade**

### Routes

Located in:

```text
routes/web.php