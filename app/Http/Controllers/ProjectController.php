<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return response(['projects' => $projects], 200);
    }

    public function show($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response(['message' => 'Project not found'], 404);
        }

        return response(['project' => $project], 200);
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            'ProjectName' => 'required|string',
            'Description' => 'nullable|string',
            'StartDate' => 'required|date',
            'DueDate' => 'required|date',
        ]);

        $project = Project::create([
            'ProjectName' => $request->input('ProjectName'),
            'Description' => $request->input('Description'),
            'UserID' => auth()->id(), // Set the UserID based on the authenticated user.
            'StartDate' => $request->input('StartDate'),
            'DueDate' => $request->input('DueDate'),
        ]);

        return response(['message' => 'Project created successfully', 'project' => $project], 201);
    } catch (\Exception $e) {
        return response(['message' => 'Failed to create the project', 'error' => $e->getMessage()], 500);
    }
}


    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response(['message' => 'Project not found'], 404);
        }

        $request->validate([
            'ProjectName' => 'string',
            'Description' => 'string',
            'UserID' => 'exists:users,id',
            'StartDate' => 'date',
            'DueDate' => 'date',
        ]);

        if ($request->has('ProjectName')) {
            $project->ProjectName = $request->input('ProjectName');
        }
        if ($request->has('Description')) {
            $project->Description = $request->input('Description');
        }
        if ($request->has('UserID')) {
            $project->UserID = $request->input('UserID');
        }
        if ($request->has('StartDate')) {
            $project->StartDate = $request->input('StartDate');
        }
        if ($request->has('DueDate')) {
            $project->DueDate = $request->input('DueDate');
        }

        $project->save();

        return response(['message' => 'Project updated successfully', 'project' => $project], 200);
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response(['message' => 'Project not found'], 404);
        }

        $project->delete();

        return response(['message' => 'Project deleted successfully'], 200);
    }
}
