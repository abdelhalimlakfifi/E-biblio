<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
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


Route::post('/auth/saveuser', [AuthController::class, 'saveUser']);
Route::post('/auth/saveadmin', [AuthController::class, 'saveadmin'])->name('auth.saveadmin');
Route::post('/auth/admincheck', [AuthController::class, 'adminCheck'])->name('admin.check');
Route::get('/auth/logout', [AuthController::class, 'logout']);
Route::post('/admin/save-book', [BookController::class, 'saveBook']);
// Route::group(['middleware'=> ['AuthCheck']], function (){
//     Route::get('admin/dashboard', [MainController::class, "dashboard"]);
//     Route::get('/auth/login',    [MainController::class, "login"])->name('auth.login');
//     Route::get('/auth/register', [MainController::class, "register"])->name('auth.register');
// });


Route::group(['middleware' => ['AuthorCkeck']], function(){
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard']);
    Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('admin/add-books', function(){
        return view('book.add');
    });
});

Route::get('/', function () {
    return view('welcome');
});

