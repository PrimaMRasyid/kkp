<?php

use Illuminate\Support\Facades\Mail;
use Milon\Barcode\DNS1D;

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

Route::get('test_email', function () {
    Mail::send('emails.welcome', [], function ($message) {

        $message->from('boboiboi055@gmail.com', 'Activated Account');

        $message->to('hahahihi123@mailinator.com')->subject('Congratulations!. Your Account Has Been Activated');

    });
});

Route::group(['prefix' => 'lab'], function(){
	Route::get('/', function(){
		return view('welcome');
	});
	Auth::routes();
		
	Route::group(['middleware' => ['userlab'], 'namespace' => 'Lab'], function(){
		Route::get('home', 'HomeController@index')->name('lab.home');
		Route::get('show/{id}', 'HomeController@detail')->name('lab.detail');
		Route::get('paid/{id}', 'HomeController@setPaid')->name('lab.paid');
		Route::get('test/{id}', 'HomeController@setDoneTest')->name('lab.test');
	});
});

Route::group(['prefix' => 'bank', 'namespace' => 'Bank'], function(){
	Route::get('login', 'AuthController@showLoginForm');
	Route::post('login','AuthController@login')->name('bank.login');
		
	Route::group(['middleware' => ['userbank']], function(){
		Route::get('/', 'HomeController@index')->name('bank.home');
		Route::get('show/{id}', 'HomeController@detail')->name('bank.detail');
		Route::get('paid/{id}', 'HomeController@setPaid')->name('bank.paid');
	});
});

Route::group(['prefix' => 'pabean', 'namespace' => 'Pabean'], function(){
	Route::get('login', 'AuthController@showLoginForm');
	Route::post('login','AuthController@login')->name('pabean.login');
		
	Route::group(['middleware' => ['userpabean']], function(){
		Route::get('/', 'HomeController@index')->name('pabean.home');
		Route::get('show/{id}', 'HomeController@detail')->name('pabean.detail');
		Route::post('cari', 'HomeController@cari')->name('pabean.cari');
		Route::get('paid/{id}', 'HomeController@setPaid')->name('pabean.paid');
	});
});

Route::get('/need_approval', function(){
	return view('need_approval');
})->name('need_approval');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/add', 'HomeController@add')->name('form.add');
Route::post('/add', 'HomeController@store')->name('form.store');
Route::get('/show/{id}', 'HomeController@detail')->name('form.detail');
Route::get('barcode', function(){
	
});

Auth::routes();

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
