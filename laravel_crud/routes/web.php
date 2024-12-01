<?php

use App\Http\Controllers\API\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Routes for TaskController
Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('tasks/home', [TaskController::class, 'home'])->name('tasks.home');
Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('tasks/{id}', [TaskController::class, 'show']);
