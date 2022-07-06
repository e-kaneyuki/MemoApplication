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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
           return view('auth.home');
    })->name('auth.home');
    Route::group(['prefix' => 'task', 'as' => 'task.'], function() {
        Route::get('/index', 'App\Http\Controllers\TaskController@index')->name('index');
        Route::get('/show/{id}', 'App\Http\Controllers\TaskController@show')->name('show');
        Route::get('/create', 'App\Http\Controllers\TaskController@create')->name('create');
        Route::post('/store', 'App\Http\Controllers\TaskController@store')->name('store');
        Route::get('/edit/{id}', 'App\Http\Controllers\TaskController@edit')->name('edit');
        Route::patch('/update/{id}', 'App\Http\Controllers\TaskController@update')->name('update');
        Route::get('/delete/{id}', 'App\Http\Controllers\TaskController@delete')->name('delete');
        Route::patch('/delete/{id}', 'App\Http\Controllers\TaskController@delete')->name('delete');
        Route::get('/search/{id}', 'App\Http\Controllers\TaskController@search')->name('search');
    });
});
require __DIR__.'/auth.php';
