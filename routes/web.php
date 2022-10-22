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

Route::get('create-routes', 'RouteController@InsertData');
Route::get('create-reps', 'RepresentativeController@InsertData');

Route::get('/', 'RepresentativeController@index');
Route::get('get-representative', 'RepresentativeController@getRep');
Route::get('edit-representative', 'RepresentativeController@editRep');
Route::get('save-representative', 'RepresentativeController@getSave');
Route::post('representative', 'RepresentativeController@save');
Route::post('rep-edit', 'RepresentativeController@saveEdit');
Route::get('delete-rep', 'RepresentativeController@deleteRep');
