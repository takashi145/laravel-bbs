<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ThreadPostRequest;
use App\Models\PrimaryCategory;

class ThreadController extends Controller
{
    public function index()
    {   
        if(!empty($_GET['category'])){
            $threads = Thread::with('user', 'secondary_category')
                ->latest('updated_at')
                ->where('secondary_category_id', $_GET['category'])
                ->get();
        }else {
            $threads = Thread::with('user', 'secondary_category')
                ->latest('updated_at')
                ->get();
        }
        

        $primary_categories = PrimaryCategory::with('secondary_categories')
            ->get();

        return view('thread.index', compact('threads', 'primary_categories'));
    }

    public function create()
    {
        $primary_categories = PrimaryCategory::with('secondary_categories')
            ->get();
        return view('thread.create', compact('primary_categories'));
    }

    public function store(ThreadPostRequest $request)
    {
        $data = $request->validated();

        Thread::create([
            'user_id' => Auth::id(),
            'secondary_category_id' => $data['category_id'],
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
        $primary_categories = PrimaryCategory::with('secondary_categories')
            ->get();
        return view('thread.edit', compact('thread', 'primary_categories'));
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
