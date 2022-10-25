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

Route::get('/', [App\Http\Controllers\TasksController::class, 'index']);

Route::resource('tasks', App\Http\Controllers\TasksController::class);
Route::resource('projects', App\Http\Controllers\ProjectsController::class);
