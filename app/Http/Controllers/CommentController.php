<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\CommentPostRequest;

class CommentController extends Controller
{
    public function store(CommentPostRequest $request, $id)
    {
        $data = $request->validated();
        Comment::create([
            'user_id' => Auth::id(),
            'thread_id' => $id,
            'comment' => $data['comment'],
        ]);

        return redirect()
                ->back()
                ->with('message', 'コメントしました。');
    }
}