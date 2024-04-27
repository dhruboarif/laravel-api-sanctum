<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function storeAdminTask(Request $request)
{
    // Validate request data
    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
    ]);

    // Create task
    $task = new Task();
    $task->title = $request->title;
    $task->description = $request->description;
    $task->save();

    // Return success response
    return response()->json(['message' => 'Task created successfully'], 201);
}

public function storeUserTask(Request $request)
{
    // Validate request data
    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
    ]);

    // Create task
    $task = new Task();
    $task->title = $request->title;
    $task->description = $request->description;
    $task->save();

    // Return success response
    return response()->json(['message' => 'Task submitted successfully'], 201);
}
}
