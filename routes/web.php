<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('task', TaskController::class);
Route::resource('categories', CategoryController::class);


Route::get('history', [TaskController::class, 'history'])->name('history');

Route::patch('/tasks/{task}/done', [TaskController::class, 'markAsDone'])->name('task.done');
Route::patch('/tasks/{task}/undone', [TaskController::class, 'markAsUndone'])->name('task.undone');
