<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    use RefreshDatabase;

    public function testCreateTask()
    {
        $data = [
            'title' => 'Test Task',
            'description' => 'This is a test task.',
            'user'=> 'TestUser'
        ];

        $response = $this->json('POST', '/api/tasks', $data);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Task created successfully'])
            ->assertJsonStructure(['message', 'data' => ['id', 'title', 'description', 'user']]);
    }

    public function testListTasks()
    {
        Task::factory(3)->create(); 

        $response = $this->json('GET', '/api/tasks');

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => [['id', 'title', 'description', 'attachment', 'completed']]]);
    }

    public function testShowTask()
    {
        $task = Task::factory()->create(); 

        $response = $this->json('GET', "/api/tasks/{$task->id}");

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['id', 'title', 'description', 'attachment', 'completed']]);
    }

    public function testUpdateTask()
    {
        $task = Task::factory()->create(); 

        $data = [
            'title' => 'Updated Task Title',
            'description' => 'Updated task description.',
            'attachment' => 'updated.jpg', 
            'user' => 'TestUser',
            'completed' => true,
        ];

        $response = $this->json('PUT', "/api/tasks/{$task->id}", $data);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Task updated successfully'])
            ->assertJsonFragment($data);
    }

    public function testDeleteTask()
    {
        $task = Task::factory()->create();

        $response = $this->json('DELETE', "/api/tasks/{$task->id}");

        $response->assertStatus(200)
            ->assertJson(['message' => 'Task deleted successfully']);
    }

}
