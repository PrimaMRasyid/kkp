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
Route::get('/need_approval', function(){
	return view('need_approval');
})->name('need_approval');
Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
	Route::get('login', 'AuthController@showLoginForm');
	Route::post('login','AuthController@login')->name('admin.login');

	Route::group(['middleware' => ['admin']], function(){
		Route::get('/', 'HomeController@index');
		Route::get('user', 'UserController@index')->name('user');
		Route::get('user/show/{id}', 'UserController@show')->name('user.show');
	});
});
