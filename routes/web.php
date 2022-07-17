<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleCalendarController;
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
    Route::group(['prefix' => 'calendar'], function() {
        Route::get('/index', 'App\Http\Controllers\GoogleCalendarController@index')->name('index_task_google_calendar');
        Route::get('/show/{id}', 'App\Http\Controllers\GoogleCalendarController@show')->name('show_task_google_calendar');
        Route::get('/create', 'App\Http\Controllers\GoogleCalendarController@create_google_calendar')->name('create_task_google_calendar');
        Route::post('/store', 'App\Http\Controllers\GoogleCalendarController@store_google_calendar')->name('store_task_google_calendar');
        Route::get('/edit/{id}', 'App\Http\Controllers\GoogleCalendarController@edit_google_calendar')->name('edit_task_google_calendar');
        Route::patch('/update/{id}', 'App\Http\Controllers\GoogleCalendarController@update_google_calendar')->name('update_task_google_calendar');
        Route::get('/delete/{id}', 'App\Http\Controllers\GoogleCalendarController@delete_google_calendar')->name('delete_task_google_calendar');
        Route::patch('/delete/{id}', 'App\Http\Controllers\GoogleCalendarController@delete_google_calendar')->name('delete_task_google_calendar');
    });
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
    Route::group(['prefix' => 'place', 'as' => 'place.'], function() {
        Route::get('/index', 'App\Http\Controllers\PlaceController@index')->name('index');
        Route::get('/show/{id}', 'App\Http\Controllers\PlaceController@show')->name('show');
        Route::get('/create', 'App\Http\Controllers\PlaceController@create')->name('create');
        Route::post('/store', 'App\Http\Controllers\PlaceController@store')->name('store');
        Route::get('/edit/{id}', 'App\Http\Controllers\PlaceController@edit')->name('edit');
        Route::patch('/update/{id}', 'App\Http\Controllers\PlaceController@update')->name('update');
        Route::get('/delete/{id}', 'App\Http\Controllers\PlaceController@delete')->name('delete');
        Route::patch('/delete/{id}', 'App\Http\Controllers\PlaceController@delete')->name('delete');
        Route::get('/search/{id}', 'App\Http\Controllers\PlaceController@search')->name('search');
    });
});
require __DIR__.'/auth.php';
