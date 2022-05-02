<?php

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

Route::get('/thread', [ThreadController::class, 'index'])->name('thread.index');
Route::get('/thread/create', [ThreadController::class, 'create'])->name('thread.create');
Route::post('/thread/create', [ThreadController::class, 'store'])->name('thread.store');
Route::get('/thread/{thread}', [ThreadController::class, 'show'])->name('thread.show');
Route::get('/thread/{thread}/edit', [ThreadController::class, 'edit'])->name('thread.edit');
Route::put('/thread/{thread}/edit', [ThreadController::class, 'update'])->name('thread.update');
Route::delete('/thread/{thread}/delete', [ThreadController::class, 'destroy'])->name('thread.delete');


require __DIR__.'/auth.php';
