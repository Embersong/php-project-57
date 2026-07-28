<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::resources([
    'task_statuses' => TaskStatusController::class,
    'tasks' => TaskController::class,
]);

require __DIR__ . '/auth.php';
