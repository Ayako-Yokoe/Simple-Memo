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
Route::get('/memos', [MemosController::class, 'index'])->name('memos.index');

// Show Create form
// Route::get('/memos/create', [MemosController::class, 'create'])

// Store Newly Created Memo
// Route::post('/memos/create', [MemosController::class, 'store'])
Route::post('/memos/store', [MemosController::class, 'store']);


// Show Single Memo
Route::get('/memos/{id}/edit', [MemosController::class, 'show']);
// // OR
// Route::get('/memos/{memo}', [MemosController::class, 'show'])


// Show Edit Form
// Route::get('/memos', [MemosController::class, 'edit']);

 // Update Memo
 Route::put('/memos/{id}/edit', [MemosController::class, 'update']);

 // OR
//  Route::put('/memos/{memo}', [MemosController::class, 'update'])


// Delete Memo
Route::delete('/memos/{id}', [MemosController::class, 'destroy']);

// OR
// Route::delete('/memos/{memo}', [MemosController::class, 'destroy'])


// Register/Log in

// Show Register Form
Route::get('/register', [UserController::class, 'create']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout']);

// Show Login Form
Route::get('/login', [UserController::class, 'login']);

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
