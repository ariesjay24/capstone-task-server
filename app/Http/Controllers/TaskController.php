<?php

namespace App\Http\Controllers;  

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index(Request $request)
    {
    $tasks = Task::with('user')->orderBy($request->input('sortField', 'id'), $request->input('sortOrder', 'asc'))->get();
    return response(['tasks' => $tasks], 200);
    }



    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response(['message' => 'Task not found'], 404);
        }

        return response(['task' => $task], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'TaskName' => 'required|string',
            'Description' => 'nullable|string',
            'Priority' => 'required|integer',
            'Status' => 'required|string',
            'StartDate' => 'required|date',
            'DueDate' => 'required|date',
            'ProjectID' => 'required|exists:projects,id',
            'UserID' => 'required|exists:users,id',
            'Type' => 'required|string',
        ]);

        $task = Task::create([
            'TaskName' => $request->input('TaskName'),
            'Description' => $request->input('Description'),
            'Priority' => $request->input('Priority'),
            'Status' => $request->input('Status'),
            'StartDate' => $request->input('StartDate'),
            'DueDate' => $request->input('DueDate'),
            'ProjectID' => $request->input('ProjectID'),
            'UserID' => auth()->id(), 
            'Type' => $request->input('Type'),
        ]);

        return response(['message' => 'Task created successfully', 'task' => $task], 201);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response(['message' => 'Task not found'], 404);
        }

        $request->validate([
            'TaskName' => 'string',
            'Description' => 'string',
            'Priority' => 'integer',
            'Status' => 'string',
            'StartDate' => 'date',
            'DueDate' => 'date',
            'ProjectID' => 'exists:projects,id',
            'UserID' => 'exists:users,id',
            'Type' => 'string',
        ]);

        if ($request->has('TaskName')) {
            $task->TaskName = $request->input('TaskName');
        }
        if ($request->has('Description')) {
            $task->Description = $request->input('Description');
        }
        if ($request->has('Priority')) {
            $task->Priority = $request->input('Priority');
        }
        if ($request->has('Status')) {
            $task->Status = $request->input('Status');
        }
        if ($request->has('StartDate')) {
            $task->StartDate = $request->input('StartDate');
        }
        if ($request->has('DueDate')) {
            $task->DueDate = $request->input('DueDate');
        }
        if ($request->has('ProjectID')) {
            $task->ProjectID = $request->input('ProjectID');
        }
        if ($request->has('UserID')) {
            $task->UserID = $request->input('UserID');
        }
        if ($request->has('Type')) {
            $task->Type = $request->input('Type');
        }

        $task->save();

        return response(['message' => 'Task updated successfully', 'task' => $task], 200);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response(['message' => 'Task deleted successfully'], 200);
    }

    public function getTasksByProject($id)
    {
        $tasks = Task::where('ProjectID', $id)->get();

        if ($tasks->isEmpty()) {
            return response(['message' => 'No tasks found for the project'], 404);
        }

        return response(['tasks' => $tasks], 200);
    }

}

