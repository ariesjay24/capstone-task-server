<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response(['comments' => $comments], 200);
    }

    public function show($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response(['message' => 'Comment not found'], 404);
        }

        return response(['comment' => $comment], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Text' => 'required|string',
            'UserID' => 'required|exists:users,id',
            'TaskID' => 'required|exists:tasks,id',
        ]);

        $comment = Comment::create([
            'Text' => $request->input('Text'),
            'UserID' => $request->input('UserID'),
            'TaskID' => $request->input('TaskID'),
        ]);

        return response(['message' => 'Comment created successfully', 'comment' => $comment], 201);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response(['message' => 'Comment not found'], 404);
        }

        $request->validate([
            'Text' => 'string',
            'UserID' => 'exists:users,id',
            'TaskID' => 'exists:tasks,id',
        ]);

        if ($request->has('Text')) {
            $comment->Text = $request->input('Text');
        }
        if ($request->has('UserID')) {
            $comment->UserID = $request->input('UserID');
        }
        if ($request->has('TaskID')) {
            $comment->TaskID = $request->input('TaskID');
        }

        $comment->save();

        return response(['message' => 'Comment updated successfully', 'comment' => $comment], 200);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response(['message' => 'Comment not found'], 404);
        }

        $comment->delete();

        return response(['message' => 'Comment deleted successfully'], 200);
    }
}
