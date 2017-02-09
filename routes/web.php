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
Route::get('/add', 'HomeController@add')->name('form.add');
Route::post('/add', 'HomeController@store')->name('form.store');

Auth::routes();

Route::group(['prefix' => 'lab'], function(){
	Route::get('/', function(){
		return view('welcome');
	});
	Auth::routes();
		
	Route::group(['middleware' => ['userlab']], function(){
		Route::get('home', function(){
			return view('home');
		});
	});
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
	Route::get('login', 'AuthController@showLoginForm');
	Route::post('login','AuthController@login')->name('admin.login');

	Route::group(['middleware' => ['admin']], function(){
		Route::get('/', 'HomeController@index');
		Route::get('user', 'UserController@index')->name('user');
		Route::get('user/show/{id}', 'UserController@show')->name('user.show');
		Route::post('user/approve', 'UserController@approve')->name('user.approve');

		// fish controller
		Route::get('fish', 'FishController@index')->name('fish');
		Route::get('fish/add', 'FishController@add')->name('fish.add');
		Route::post('fish/add', 'FishController@store')->name('fish.store');
		Route::get('fish/show/{id}', 'FishController@show')->name('fish.show');

	});
});
