# Installation Steps

git clone <repository-url>
cd task-manager
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve

# Task Management System (Laravel)

A simple Task Management System built with Laravel to manage Projects and Tasks with CRUD operations, filters, file uploads, Excel export, and REST APIs.

---

## 🚀 Features

### 🔐 Authentication
- User authentication using **Laravel Breeze**

### 📁 Projects
- Create, update, delete projects
- View project list with **task count**

### ✅ Tasks
- Create, update, delete tasks (soft delete)
- Assign tasks to projects
- Track task status:
  - Pending
  - In Progress
  - Completed
- Upload attachments (PDF/Image, max 2MB)
- Filter tasks by:
  - Project
  - Status
  - Assigned person

### 📊 Export
- Export tasks to Excel using **Maatwebsite/Excel**

### 🌐 REST APIs
- Get all projects
- Get all tasks
- Get tasks by project ID
- Update task status

---

## 🗄️ Database Structure

### Projects Table
- id
- name
- description
- start_date
- end_date

### Tasks Table
- id
- project_id
- title
- description
- assigned_to
- status
- attachment (nullable)
- due_date
- deleted_at (soft delete)

---

## 🔗 API Endpoints

| Method | Endpoint | Description |
|------|---------|------------|
| GET | /api/projects | Get all projects |
| GET | /api/tasks | Get all tasks |
| GET | /api/projects/{id}/tasks | Get tasks by project |
| PATCH | /api/tasks/{id}/status | Update task status |

**Example PATCH body:**
```json
{
  "status": "completed"
}
