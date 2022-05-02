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

    public function show($id)
    {
        $thread = Thread::findOrFail($id);
        return view('thread.show', compact('thread'));
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
}
