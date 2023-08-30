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

## API Endpoints

### User Endpoints
* Create a user:
  * Endpoint: POST /api/register
  * Request Body: JSON data containing username, email and password(must contain at least 6 char.).

* Login with an user:
  * Endpoint: POST /api/login
  * Request Body: JSON data containing email and password(save your token and use it as a bearer authorization token).
 
* Logout:
  * Endpoint: POST /api/logout

* Check if there's an logged user:
  * Endpoint: POST /api/me
  * Authorization token must be set, otherwise it wont show anything.
    
### Tasks Endpoints
* Create a Task:
  * Endpoint: POST /api/tasks
  * Request Body: JSON data containing task details.
  * The field "title" is required to create a task.
  * Authorization token must be set.
  * Example:
  * ```json
    {
    "title": "Sample Task", (Required)
    "description": "This is a sample task.",
    "attachment": "sample.jpg",
    }
    ```

* List all tasks
  * Endpoint: GET /api/tasks

* View Task Details:
   * Endpoint: GET /api/tasks/{id}

* Update Task:
  * Endpoint: PUT /api/tasks/{id}
  * Request Body: JSON data containing updated task details.
  * The field "user" is required to update a task.
  * Authorization token must be set.

* Delete Task:
  * Endpoint: DELETE /api/tasks/{id}
  * Authorization token must be set.
 
Make requests to these endpoints using your preferred HTTP client (e.g., Postman) to interact with the API.

### Testing
You can run unit tests for the API by executing the following command:

 ```bash
php artisan test
 ```

This will execute the test cases defined in the project and provide you with test results.
