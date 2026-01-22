# Task Management System (Laravel)

This project is a small Laravel-based Task Management System built as part of an assignment. It allows users to manage projects and tasks with proper relationships, status tracking, file uploads, filtering, Excel export, and REST APIs.

The focus of this project is clean backend logic, correct use of Laravel features, and a simple, usable interface.

--------------------------------------------------

INSTALLATION STEPS

git clone <repository-url>

cd task-manager

composer install

npm install

npm run build

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

php artisan serve

After setup, the application will be available at:
http://127.0.0.1:8000

--------------------------------------------------

AUTHENTICATION

User authentication is implemented using Laravel Breeze.
Only authenticated users can access and manage projects and tasks.

--------------------------------------------------

PROJECTS

The application supports full CRUD operations for projects.

Create new projects.
Edit and update existing projects.
Delete projects.
Each project can have multiple tasks.
The project listing page displays the total number of tasks for each project.

--------------------------------------------------

TASKS

Tasks are managed under projects and support full CRUD operations.

Create, update, and delete tasks (soft delete enabled).
Each task belongs to a project.
Task status tracking includes the following states:
Pending
In progress
Completed

File upload is supported while creating or editing a task.
Allowed file types: image and PDF.
Maximum file size: 2MB.

Tasks can be filtered based on:
Project
Status
Assigned person

--------------------------------------------------

EXCEL EXPORT

Tasks can be exported to an Excel file.
This functionality is implemented using the Maatwebsite/Excel package.

--------------------------------------------------

API ENDPOINTS

The project exposes REST API endpoints for accessing project and task data.

GET    /api/projects              Get all projects
GET    /api/tasks                 Get all tasks
GET    /api/projects/{id}/tasks   Get tasks by project ID
PATCH  /api/tasks/{id}/status     Update task status

Example request body for updating task status:

{
  "status": "completed"
}

--------------------------------------------------

DATABASE STRUCTURE

PROJECTS TABLE
id
name
description
start_date
end_date

TASKS TABLE
id
project_id
title
description
assigned_to
status
attachment (nullable)
due_date
deleted_at (soft delete)

--------------------------------------------------

NOTES

The environment file (.env) is not committed to the repository for security reasons.
API routes are enabled via bootstrap/app.php (Laravel 12 setup).
API endpoints were tested using Postman.

--------------------------------------------------

AUTHOR

Harsh Vegad
