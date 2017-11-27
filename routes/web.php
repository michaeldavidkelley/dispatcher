<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('services', ServicesController::class);
// Route::resource('events', EventsController::class, ['except' => ['store', 'index', 'create']]);
// Route::resource('listeners', ListenersController::class, ['except' => ['store', 'index', 'create']]);

Route::group(['prefix' => 'services/{service}'], function () {
    Route::resource('events', EventsController::class);

    Route::group(['prefix' => 'events/{event}'], function () {
        Route::resource('listeners', ListenersController::class);
    });
});
