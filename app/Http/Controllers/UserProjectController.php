<?php

namespace App\Http\Controllers;

use App\Models\UserProject;
use Illuminate\Http\Request;

class UserProjectController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'UserID' => 'required|exists:users,id',
            'ProjectID' => 'required|exists:projects,id',
        ]);

        UserProject::create([
            'UserID' => $request->input('UserID'),
            'ProjectID' => $request->input('ProjectID'),
        ]);

        return response(['message' => 'User added to project successfully'], 201);
    }

    public function index()
    {
        $userProjects = UserProject::all();
        return response(['userProjects' => $userProjects], 200);
    }

    public function show($id)
    {
        $userProject = UserProject::find($id);

        if (!$userProject) {
            return response(['message' => 'User-Project relationship not found'], 404);
        }

        return response(['userProject' => $userProject], 200);
    }

    public function destroy($id)
    {
        $userProject = UserProject::find($id);

        if (!$userProject) {
            return response(['message' => 'User-Project relationship not found'], 404);
        }

        $userProject->delete();

        return response(['message' => 'User removed from project successfully'], 200);
    }
}
