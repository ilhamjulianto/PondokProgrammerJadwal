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

Route::get('/', 'HomepageController@show' );

Route::get('/algorithm', function () {
	return view('machine');
});

Route::get('/remake', function () {
	return view('2machine');
});

Route::get('/machine', 'HomepageController@uji_coba');

Route::get('/santri/create', function () {
    return view('santri_create');
});
Route::post('/santri', 'HomepageController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home/santri', 'HomeController@shuffleGroup')->name('home/santri');
Route::post('/home/area', 'HomeController@area')->name('home/area');
Route::post('/home/jadwal', 'HomeController@shuffleSchedule')->name('home');
