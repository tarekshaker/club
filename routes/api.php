<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sports','API\SportController@getAllSports');
Route::get('/sports/{id}','API\SportController@getSport');
Route::post('/sports/add','API\SportController@addSport');
Route::put('/sports/update/{id}','API\SportController@updateSport');
Route::delete('/sports/delete/{id}','API\SportController@deleteSport');


Route::get('/sessions','API\SessionController@getAllSessions');
Route::get('/sessions/{id}','API\SessionController@getSession');
Route::post('/sessions/add','API\SessionController@addSession');
Route::put('/sessions/update/{id}','API\SessionController@updateSession');
Route::delete('/sessions/delete/{id}','API\SessionController@deleteSession');

Route::get('/sessionsSortedBySport','API\SessionController@getSessionsSortedBySport');
Route::get('/sessionsOfSport/{id}','API\SessionController@getSessionsOfSport');
Route::get('/availableSlotsOfSession/{id}','API\SessionController@getAvailableSlotsOfSession');
Route::get('/availableSessions','API\SessionController@getAllAvailableSessions');

Route::post('/bookings/add','API\BookingController@addBooking');


Route::get('/sportWithMaxAttendees','API\BookingController@getSportWithMaxAttendees');
Route::get('/sessionWithBookingTime','API\BookingController@getSessionsWithBookingTime');

