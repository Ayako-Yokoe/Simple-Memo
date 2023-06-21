<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemosController;

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
    return view('layout');
});

// Show All Memos
Route::get('/memos', [MemosController::class, 'index'])->name('memos.index')->middleware('auth');

// Show Create form
// Route::get('/memos/create', [MemosController::class, 'create'])

// Store Newly Created Memo
Route::post('/memos/store', [MemosController::class, 'store'])->middleware('auth');


// Show Single Memo
Route::get('/memos/{id}/edit', [MemosController::class, 'show'])->middleware('auth');


// Show Edit Form
// Route::get('/memos', [MemosController::class, 'edit']);

 // Update Memo
 Route::put('/memos/{id}/edit', [MemosController::class, 'update'])->middleware('auth');


// Delete Memo
Route::delete('/memos/{id}', [MemosController::class, 'destroy'])->middleware('auth');



// Register/Log in

// Show Register Form
Route::get('/register', [UserController::class, 'create']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('users.login');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
