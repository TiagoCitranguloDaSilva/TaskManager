<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::middleware(['web', 'api'])->group(function(){

    Route::get('/tasks', [TaskController::class, 'index']);

    Route::get('/newTask', [TaskController::class, 'create']);

    Route::post('/tasks', [TaskController::class, 'store']);

    Route::put('/tasks/{id}', [TaskController::class, 'update']);

    Route::get('/editar/{id}', [TaskController::class, 'edit']);

    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

    Route::get('/mostrar/{id}', [TaskController::class, 'show']);

});

