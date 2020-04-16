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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/routes', 'HomeController@admin')->middleware('admin');
Route::get('/admin/schedule/create', 'ScheduleController@create')->middleware('admin');
Route::get('/admin/cinemas/create', 'CinemaController@create')->middleware('admin');
Route::post('/admin/schedule/post', 'ScheduleController@store')->middleware('admin');

Route::post('/admin/cinemas/post', 'CinemaController@store')->middleware('admin');
Route::get('/cinemas/{cinema}', 'CinemaController@show');
Route::get('/schedule/{cinema_id}', 'ScheduleController@show');
Route::get('/reservation/{schedule}/show', 'ReservationController@show');
Route::get('/reservation/{schedule}/create', 'ReservationController@create')->middleware('admin');
Route::post('/reservation/search', 'ReservationController@search');
Route::post('/admin/resevation/post', 'ReservationController@store')->middleware('admin');
Route::post('/character/post', 'CharacterController@store')->middleware('admin');
Route::post('/reservation/upload/csv', 'ReservationController@upload')->middleware('admin');

View::composer(['*'], function ($view) {

    $schedules = App\Schedule::all();
    $view->with('schedules',$schedules);

});

View::composer(['*'], function ($view) {

    $reservations = App\Reservation::all();
    $view->with('reservations',$reservations);

});

View::composer(['*'], function ($view) {

    $cinemas = App\Cinema::all();
    $view->with('cinemas',$cinemas);

});

