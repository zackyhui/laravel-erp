<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Http\Controllers\Web\StudentController;

Route::get('/students', [StudentController::class, 'index']);
//Route::get('/students', 'App\Http\Controllers\StudentController@index');

Route::get('/students/{id}', [StudentController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
});
