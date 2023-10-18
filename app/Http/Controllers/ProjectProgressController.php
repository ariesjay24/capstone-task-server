<?php

namespace App\Http\Controllers;

use App\Models\ProjectProgress;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectProgressController extends Controller
{
    public function index()
    {
        $progress = ProjectProgress::all();
        return response(['progress' => $progress], 200);
    }

    public function show($id)
    {
        $progress = ProjectProgress::find($id);

        if (!$progress) {
            return response(['message' => 'Progress not found'], 404);
        }

        return response(['progress' => $progress], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'TaskID' => 'required|exists:tasks,id',
            'ProgressPercentage' => 'required|integer',
            'ProgressDescription' => 'nullable|string',
            'ProgressDate' => 'required|date',
        ]);

        $progress = ProjectProgress::create([
            'TaskID' => $request->input('TaskID'),
            'ProgressPercentage' => $request->input('ProgressPercentage'),
            'ProgressDescription' => $request->input('ProgressDescription'),
            'ProgressDate' => $request->input('ProgressDate'),
        ]);

        return response(['message' => 'Progress created successfully', 'progress' => $progress], 201);
    }

    public function update(Request $request, $id)
    {
        $progress = ProjectProgress::find($id);

        if (!$progress) {
            return response(['message' => 'Progress not found'], 404);
        }

        $request->validate([
            'TaskID' => 'exists:tasks,id',
            'ProgressPercentage' => 'integer',
            'ProgressDescription' => 'string',
            'ProgressDate' => 'date',
        ]);

        if ($request->has('TaskID')) {
            $progress->TaskID = $request->input('TaskID');
        }
        if ($request->has('ProgressPercentage')) {
            $progress->ProgressPercentage = $request->input('ProgressPercentage');
        }
        if ($request->has('ProgressDescription')) {
            $progress->ProgressDescription = $request->input('ProgressDescription');
        }
        if ($request->has('ProgressDate')) {
            $progress->ProgressDate = $request->input('ProgressDate');
        }

        $progress->save();

        return response(['message' => 'Progress updated successfully', 'progress' => $progress], 200);
    }

    public function destroy($id)
    {
        $progress = ProjectProgress::find($id);

        if (!$progress) {
            return response(['message' => 'Progress not found'], 404);
        }

        $progress->delete();

        return response(['message' => 'Progress deleted successfully'], 200);
    }
}
