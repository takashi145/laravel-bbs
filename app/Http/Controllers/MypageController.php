<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $threads = Thread::where('user_id', Auth::id())->paginate(10);
        return view('mypage.index', compact('threads'));
    }
}
