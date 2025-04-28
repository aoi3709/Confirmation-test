<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [ContactController::class, 'register'])->name('register');
Route::post('/register', [ContactController::class, 'store'])->middleware(['guest'])->name('register.post'); 
Route::get('/login', [ContactController::class, 'login'])->name('login');
Route::post('/login', [ContactController::class, 'store'])->middleware(['guest']);
Route::get('/admin/search', [ContactController::class, 'search'])->name('admin.search');
Route::post('/admin', [ContactController::class, 'admin']);
Route::post('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
//Route::get('/', [AuthController::class, 'index']);