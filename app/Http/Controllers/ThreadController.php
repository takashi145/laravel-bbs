<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ThreadPostRequest;
use App\Models\PrimaryCategory;
use App\Models\SecondaryCategory;
use Illuminate\Support\Facades\Storage;

class ThreadController extends Controller
{
    public function index()
    {
        if(!empty($_GET['category'])){
            $threads = Thread::with('user', 'secondary_category')
                ->latest('updated_at')
                ->where('secondary_category_id', $_GET['category'])
                ->paginate(10);
        }else {
            $threads = Thread::with('user', 'secondary_category.primary_category')
                ->latest('updated_at')
                ->paginate(10);
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

        $image_file = $request->file('image_file');
        $image = null;
        //画像が選択されていたら保存
        if(!is_null($image_file) && $image_file->isValid()) {
            $image = explode('public/thread/', Storage::putFile('public/thread', $image_file))[1];
        }

        Thread::create([
            'user_id' => Auth::id(),
            'image' => $image,
            'secondary_category_id' => $data['secondary_category_id'],
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
        
        $image_file = $request->file('image_file');
        $image = $thread->image;
        if($request->image_delete){
            Storage::delete('public/thread/'.$thread->image);
        }else {
            //画像が選択されていたら更新
            if(!is_null($image_file) && $image_file->isValid()) {
                Storage::delete('public/thread/'.$thread->image);
                $image = explode('public/thread/', Storage::putFile('public/thread', $image_file))[1];
            }
        }
        
        $thread->image = $image;
        $thread->secondary_category_id = $data['secondary_category_id'];
        $thread->title = $data['title'];
        $thread->body = $data['body'];
        $thread->save();

        return redirect()
                ->back()
                ->with('message', 'スレッドを更新しました。');
    }

    public function destroy(Thread $thread)
    {
        $thread->delete();
        return redirect()
                ->back()
                ->with('alert', 'スレッドを削除しました。');
    }
}
