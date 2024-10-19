<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return redirect('/admin/login');
});
// Login page
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');
// Logout-page
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
// Registration page
Route::get('/admin/register', [LoginController::class, 'showRegistrationForm'])->name('admin.register'); 
Route::post('/admin/register', [LoginController::class, 'register'])->name('admin.register.post');
// Front page
Route::get('/front/index', [IndexController::class, 'index'])->name('front.index');
// Calculator page
Route::get('/tasks/calc', [IndexController::class, 'calc'])->name('tasks.calc');
// Timer page
Route::get('/tasks/timer', [IndexController::class, 'timer'])->name('tasks.timer');
// Todo page
Route::get('/tasks/todo', [IndexController::class, 'todo'])->name('tasks.todo');


Route::get('tasks/todo',[TodoController::class,'todo'])->name('tasks.todo');
Route::middleware(['auth']) // Protect these routes
    ->group(function () {
        Route::get('tasks/todo',[TodoController::class,'todo'])->name('tasks.todo');
        Route::get('/tasks', [TodoController::class, 'todo'])->name('tasks.todo');
        Route::post('/tasks', [TodoController::class, 'store'])->name('tasks.store');
        Route::patch('/tasks/{id}/complete', [TodoController::class, 'complete'])->name('tasks.complete');
        Route::delete('/tasks/{id}', [TodoController::class, 'destroy'])->name('tasks.destroy');
    });

