<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function index()
    {
        $threads = Thread::with(['secondary_category.primary_category', 'user'])
            ->where('user_id', Auth::id())
            ->paginate(10);
        
        return view('user.index', compact('threads'));
    }

    public function edit(Request $request)
    {
        $type = $request['type'] ?? '';
        $path = null;
        
        if($type == 'password') {
            $path = 'user.password_edit';
        }else if($type == 'destroy') {
            $path = 'user.user_delete';
        }else {
            $path = 'user.user_edit';
        }

        return view($path, ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        if($request->email != Auth::user()->email){
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }
        $image_file = $request->file('image_file');
        $image = null;
        //画像が選択されていたら保存
        if(!is_null($image_file) && $image_file->isValid()) {
            $image = explode('public/user/', Storage::putFile('public/user', $image_file))[1];
        }

        $user = User::findOrFail(Auth::id());
        $user->update([
            'image' => $image,
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()
            ->back()
            ->with('message', 'ユーザー情報を変更しました。');
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $user = User::findOrFail(Auth::id());
        if(password_verify($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()
            ->back()
            ->with("message", "パスワードを変更しました。");
        }else {
            return redirect()
            ->back()
            ->with("alert", "パスワードに間違いがあります。");
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if(password_verify($request->password, Auth::user()->password)){
            User::findOrFail(Auth::id())->delete();
            return redirect()
                ->route('login');
        }else {
            return redirect()
                ->back()
                ->with("alert", "パスワードが違います。");
        }
    }
}
