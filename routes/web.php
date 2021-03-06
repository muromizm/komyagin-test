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

Route::get('/show/{id}', function ($id) {
    return view('show', [
        'id' => $id,
    ]);
});

Route::get('/event/{showId}/{eventId}', function ($showId, $eventId) {
    return view('event', [
        'showId' => $showId,
        'eventId' => $eventId,
    ]);
});

Route::post('/reserve', 'App\Http\Controllers\Controller@reserve');
