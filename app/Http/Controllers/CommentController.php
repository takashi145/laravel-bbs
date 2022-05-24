<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\CommentPostRequest;
use App\Models\Number;
use App\Models\Thread;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    public function store(CommentPostRequest $request, $id)
    {
        $data = $request->validated();

        $image_file = $request->file('image_file');
        $image = null;
        //画像が選択されていたら保存
        if(!is_null($image_file) && $image_file->isValid()) {
            $image = explode('public/comment/', Storage::putFile('public/comment', $image_file))[1];
        }

        Comment::create([
            'user_id' => Auth::id(),
            'thread_id' => $id,
            'comment' => $data['comment'],
            'image' => $image,
        ]);

        return redirect()
                ->back()
                ->with('message', 'コメントしました。');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()
                ->back()
                ->with('alert', 'コメントを削除しました。');
    }
}
