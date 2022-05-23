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
    return view('home');
});

Route::get('thread', [ThreadController::class, 'index'])->name('thread.index');
Route::middleware('auth')->group(function() {
    Route::resource('thread', ThreadController::class)->except(['index', 'show']);
});
Route::get('thread/{thread}', [ThreadController::class, 'show'])->name('thread.show');


Route::controller(CommentController::class)->middleware('auth')
    ->prefix('comment/')->name('comment.')->group(function() {
        Route::post('{thread}', 'store')->name('store');
    Route::delete('{comment}/delete', 'destroy')->name('delete');
});


Route::controller(UserController::class)->middleware('auth')
    ->prefix('user/')->name('user.')->group(function() {
        Route::get('', 'index')->name('index');
        Route::get('edit', 'edit')->name('edit');
        Route::post('edit', 'update')->name('update');
        ROute::post('passowrd_update', 'password_update')->name('password_update');
        Route::post('delete', 'destroy')->name('destroy');
});


require __DIR__.'/auth.php';
