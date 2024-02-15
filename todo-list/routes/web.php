<?php

use App\Http\Controllers\TaskController;
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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('tasks.index');
    })->name('index');
});


Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::resource('/tasks', TaskController::class);

/*Route::get('/create', function () {
    return view('tasks.create');
})->name('create');*/