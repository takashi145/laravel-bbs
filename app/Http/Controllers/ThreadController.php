<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class ThreadController extends Controller
{
    /**
     * スレッド一覧表示
     */
    public function index()
    {
        $threads = Thread::with('user')->get();
        return view('thread.index', compact('threads'));
    }

    public function show($id)
    {
        $thread = Thread::findOrFail($id);
        return view('thread.show', compact('thread'));
    }
}
