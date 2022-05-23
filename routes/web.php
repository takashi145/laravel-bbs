<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MypageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;

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

Route::get('user', [UserController::class, 'index'])->name('user.index');
Route::get('user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('user/edit', [UserController::class, 'update'])->name('user.update');
ROute::post('user/passowrd_update', [UserController::class, 'password_update'])->name('user.password_update');
Route::post('user/delete', [UserController::class, 'destroy'])->name('user.destroy');

require __DIR__.'/auth.php';
