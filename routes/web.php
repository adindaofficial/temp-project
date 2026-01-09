<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', [App\Http\Controllers\ExampleController::class, 'index']);
Route::post('/user/tambah', [App\Http\Controllers\ExampleController::class, 'tambah'])->name('user.tambah');
Route::post('/user/tambah-captcha', [App\Http\Controllers\ExampleController::class, 'tambahCaptcha_client'])->name('user.tambah-captcha_client');
Route::post('/user/tambah-captcha-server', [App\Http\Controllers\ExampleController::class, 'tambahCaptcha_client_server'])->name('user.tambah-captcha_server');
Route::get('/user/{id}', [App\Http\Controllers\ExampleController::class, 'show']);
Route::delete('/user/reset', [App\Http\Controllers\ExampleController::class, 'reset'])->name('user.reset');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
