<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\UserController;

use \App\Http\Controllers\ProjectController;

// Route::get('/', function () {
//     return view('users.list');
// });


// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete');

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('users', 'store')->name('users.store');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit');
    Route::put('/users/{user}', 'update')->name('users.update');
    Route::delete('/users/{user}', 'delete')->name('users.delete');
});



// Route::get('users/{user}/projects', [ProjectController::class, 'listPro'])->name('projects.list');
// Route::get('projects/{user}/create', [ProjectController::class, 'createPro'])->name('projects.create');
// Route::post('users/{user}/projects', [ProjectController::class, 'storePro'])->name('projects.store');
// Route::get('users/{user}/project/{project}/edit', [ProjectController::class, 'editPro'])->name('projects.edit');
// Route::put('users/{user}/projects/{project}', [ProjectController::class, 'updatePro'])->name('projects.update');
// Route::delete('users/{user}/projects/{project}', [ProjectController::class, 'deletePro'])->name('projects.delete');

Route::controller(ProjectController::class)->group(function () {
    Route::get('users/{user}/projects', 'listPro')->name('projects.list');
    Route::get('projects/{user}/create', 'createPro')->name('projects.create');
    Route::post('users/{user}/projects', 'storePro')->name('projects.store');
    Route::get('users/{user}/projects/{project}/edit', 'editPro')->name('projects.edit');
    Route::put('users/{user}/projects/{project}', 'updatePro')->name('projects.update');
    Route::delete('users/{user}/projects/{project}', 'deletePro')->name('projects.delete');
});
