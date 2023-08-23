<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
</p>

# Task Management API

The Task Management API is a RESTful web service built with Laravel for managing tasks. This API was build for the Back-End developer test for Buzzvel.

## Table of Contents

- [Features](#features)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Testing](#testing)

## Features

- Create new tasks with titles, descriptions, attachments, user, and completion status.
- List all tasks.
- View details of a specific task.
- Update the details of a specific task.
- Delete a task.

## Getting Started

### Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP (>= 7.3)
- Composer
- Laravel (>= 8.x)
- A database (e.g., MySQL, SQLite)

### Usage

You can use the API endpoints to manage tasks in your application. Here's an overview of the available endpoints:

### API Endpoints
* Create a Task:
  * Endpoint: POST /api/tasks
  * Request Body: JSON data containing task details.
  * The field "title" and "tser" are required to create a task.
  * Example:
  * ```json
    {
    "title": "Sample Task", (Required)
    "description": "This is a sample task.",
    "attachment": "sample.jpg",
    "user": "Paulo", (Required)
    }




* List all tasks
  * Endpoint: GET /api/tasks

* View Task Details:
   * Endpoint: GET /api/tasks/{id}

* Update Task:
  * Endpoint: PUT /api/tasks/{id}
  * Request Body: JSON data containing updated task details.
  * The field "user" is required to update a task.

* Delete Task:
  * Endpoint: DELETE /api/tasks/{id}
 
Make requests to these endpoints using your preferred HTTP client (e.g., Postman) to interact with the API.

### Testing
You can run unit tests for the API by executing the following command:

 ```bash
php artisan test
 ```

This will execute the test cases defined in the project and provide you with test results.

## For online testing, use the following website: taskapi.wuaze.com
