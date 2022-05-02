<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ThreadPostRequest;

class ThreadController extends Controller
{
    public function index()
    {
        $threads = Thread::with('user')->latest('updated_at')->get();
        return view('thread.index', compact('threads'));
    }

    public function create()
    {
        return view('thread.create');
    }

    public function store(ThreadPostRequest $request)
    {
        $data = $request->validated();

        Thread::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'body' => $data['body'],
        ]);

        return redirect()
                ->route('thread.index')
                ->with('message', 'スレッドを作成しました。');
    }

    public function show(Thread $thread)
    {
        $comments = $thread->comments->load('user');
        return view('thread.show', compact('thread', 'comments'));
    }

    public function edit(Thread $thread)
    {
        //作成者じゃないなら404
        if(Auth::id() != $thread->user->id){
            abort(404);
        }
        return view('thread.edit', compact('thread'));
    }

    public function update(Thread $thread, ThreadPostRequest $request)
    {
        $data = $request->validated();
        $thread->update($data);
        return redirect()
                ->route('thread.index')
                ->with('message', 'スレッドを更新しました。');
    }

    public function destroy(Thread $thread)
    {
        $thread->delete();
        return redirect()
                ->route('thread.index')
                ->with('message', 'スレッドを削除しました。');
    }
}
