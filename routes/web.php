<?php

use App\Http\Controllers\TaskController;
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

Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
Route::get('/', [TaskController::class, 'create'])->name('new.task');
Route::post('/task/store', [TaskController::class, 'store'])->name('task.create');
Route::get('/statistics', [TaskController::class, 'statistics'])->name('task.statistics');
