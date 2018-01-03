<?php

use GuzzleHttp\Client;
use App\Event;

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

Route::group(['prefix' => 'services/{service}'], function () {
    Route::resource('events', EventsController::class, ['except' => ['index']]);

    Route::group(['prefix' => 'events/{event}'], function () {
        Route::resource('listeners', ListenersController::class, ['except' => ['index']]);
    });
});

Route::group(['prefix' => 'hooks/events/{event}'], function () {
    Route::post('trigger', function ($event) {
        $event = Event::find($event);
        $client = new Client(['timeout' => 1]);

        foreach ($event->listeners()->whereNotNull('webhook')->get() as $listener) {
            $client->request('post', $listener->webhook);
        }
    })->name('events.trigger');
});

Route::view('todo', 'todo');

Route::post('test/listener/hook/A', function () {
    file_put_contents('/Users/michaelkelley/Sites/listener.log', PHP_EOL . 'hit-A-' . time(), FILE_APPEND);
    return response()->json();
});
// Route::post('test/listener/hook/B', function () {
//     file_put_contents('/Users/michaelkelley/Sites/listener.log', PHP_EOL . 'hit-B-' . time(), FILE_APPEND);
// });
