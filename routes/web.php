<?php

use App\Http\Controllers\API\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;

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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
});

Route::group(['middleware' => 'role:user'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
