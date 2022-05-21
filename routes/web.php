<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MypageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('thread', ThreadController::class);

Route::post('comment/{thread}', [CommentController::class, 'store'])->name('comment.store');
Route::delete('comment/{comment}/delete', [CommentController::class, 'destroy'])->name('comment.delete');

Route::get('mypage', [MypageController::class, 'index'])->name('mypage.index');

require __DIR__.'/auth.php';
