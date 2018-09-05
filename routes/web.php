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
    return view('auth/login');
});



Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('home', 'LeavesController@showLeaves');

Route::get('approve_leave/{id}', 'LeavesController@approveLeave');

Route::get('deny_leave/{id}', 'LeavesController@denyLeave');

Route::get('cancel_leave/{id}', 'LeavesController@cancelLeave');

Route::post('submit_leave/{id}', 'LeavesController@submitLeave');

Route::post('add_employee', 'UsersController@addEmployee');

Route::post('show_employee/{id}', 'UsersController@showEmployee');

Route::post('edit_profile/{id}', 'UsersController@editProfile');

Route::get('del_employee/{id}', 'UsersController@deleteEmployee');
