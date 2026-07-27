<?php

use App\Http\Controllers\TaskStatusController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::resources(['task_statuses' => TaskStatusController::class]);

require __DIR__.'/auth.php';
