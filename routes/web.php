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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
     'verified'
 ])->group(function () {
     Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index', function () {
         return view('dashboard');
     })->name('dashboard');
 });

Route::middleware(['auth:sanctum', 'verified'])->get('/posts/index', 'App\Http\Controllers\PostsController@index', function () {
        return view('posts.index');
})->name('posts');

// Route::get('/','App\Http\Controllers\PagesController@index');

Route::resource('posts', 'App\Http\Controllers\PostsController');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');