<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json(['data' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'attachment' => 'nullable|string',
            'user' => 'required|string'
        ]);
    
        $task = Task::create($data);
    
        return response()->json(['message' => 'Task created successfully', 'data' => $task]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json(['data' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'string',
            'description' => 'nullable|string',
            'attachment' => 'nullable|string',
            'completed' => 'boolean',
            'user' => 'required|string',
            
        ]);
    
        $task = Task::find($id);
    
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
    
        $task->update($data);
    
        return response()->json(['message' => 'Task updated successfully', 'data' => $task]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);

    if (!$task) {
        return response()->json(['message' => 'Task not found'], 404);
    }

    $task->delete();

    return response()->json(['message' => 'Task deleted successfully']);
    }
}
