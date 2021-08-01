<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/saveuser', [AuthController::class, 'saveUser']);
Route::post('/auth/saveadmin', [AuthController::class, 'saveadmin'])->name('auth.saveadmin');
Route::post('/auth/admincheck', [AuthController::class, 'adminCkeck'])->name('admin.check');
Route::get('/admin/dashboard', [AuthController::class, 'dashboard']);
Route::get('/', function () {
    return view('welcome');
});

