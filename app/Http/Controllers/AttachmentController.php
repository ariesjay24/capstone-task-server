<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttachmentController extends Controller
{
    public function index()
    {
        $attachments = Attachment::all();
        return response(['attachments' => $attachments], 200);
    }

    public function show($id)
    {
        $attachment = Attachment::find($id);

        if (!$attachment) {
            return response(['message' => 'Attachment not found'], 404);
        }

        return response(['attachment' => $attachment], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'TaskID' => 'required|exists:tasks,id',
            'FilePath' => 'required|string', 
        ]);

        $attachment = Attachment::create([
            'TaskID' => $request->input('TaskID'),
            'FilePath' => $request->input('FilePath'),
        ]);

        return response(['message' => 'Attachment created successfully', 'attachment' => $attachment], 201);
    }

    public function update(Request $request, $id)
    {
        $attachment = Attachment::find($id);

        if (!$attachment) {
            return response(['message' => 'Attachment not found'], 404);
        }

        $request->validate([
            'TaskID' => 'exists:tasks,id',
            'FilePath' => 'string', 
        ]);

        if ($request->has('TaskID')) {
            $attachment->TaskID = $request->input('TaskID');
        }
        if ($request->has('FilePath')) {
            $attachment->FilePath = $request->input('FilePath');
        }

        $attachment->save();

        return response(['message' => 'Attachment updated successfully', 'attachment' => $attachment], 200);
    }

    public function destroy($id)
    {
        $attachment = Attachment::find($id);

        if (!$attachment) {
            return response(['message' => 'Attachment not found'], 404);
        }

        $attachment->delete();

        return response(['message' => 'Attachment deleted successfully'], 200);
    }
}
