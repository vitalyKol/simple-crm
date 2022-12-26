<?php

use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('main');

    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('clients', \App\Http\Controllers\ClientController::class);
    Route::resource('projects', \App\Http\Controllers\ProjectController::class);
    Route::resource('tasks', \App\Http\Controllers\TaskController::class);
    Route::resource('comments', \App\Http\Controllers\CommentController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('tokens/clear', [\App\Http\Controllers\Api\BaseController::class, 'clearTokens'])->middleware('auth');
Route::get('/tokens/create', [\App\Http\Controllers\Api\BaseController::class, 'createToken'])->middleware('auth');

require __DIR__.'/auth.php';
