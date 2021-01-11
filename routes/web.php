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


Route::get('/huy', 'HomeController@huy');
Route::get('/profile', 'HomeController@getProfile')->name('profile')->middleware('auth');
Route::post('/profile', 'HomeController@profile')->name('profile')->middleware('auth');
Route::get('/change-password', 'HomeController@getPassword')->name('change-password')
	->middleware('auth');
Route::post('/change-password', 'HomeController@changePassword')->name('change-password')
	->middleware('auth');
Route::get("/logout", "Auth\LoginController@logout");

Route::middleware('auth')->group(function () {
	// pick tranformer
	Route::get('/', 'HomeController@welcome')->name('welcome');

	Route::get('tba/hung-nguyen', 'HomeController@hungNguyen')->name('hung-nguyen-index');
	Route::get('tba/bac-a', 'HomeController@bacA')->name('bac-a-index');

	Route::get('bac-a/c11', 'BacAController@busbarc11');
	Route::get('bac-a/c31', 'BacAController@busbarc31');
	Route::get('bac-a/c12', 'BacAController@busbarc12');
	Route::get('bac-a/tranformer', 'BacAController@tranformer');

	Route::get('hung-nguyen/c11', 'HungNguyenController@busbarc11');
	Route::get('hung-nguyen/c31', 'HungNguyenController@busbarc31');
	Route::get('hung-nguyen/c41', 'HungNguyenController@busbarc41');
	Route::get('hung-nguyen/c42', 'HungNguyenController@busbarc42');
	Route::get('hung-nguyen/c12', 'HungNguyenController@busbarc12');
	Route::get('hung-nguyen/tranformer', 'HungNguyenController@tranformer');
});

Route::prefix('admin')->middleware('auth')->group(function () {
	Route::get('/', 'Admin\UsersController@index')->name("admin-home");
	//users
	Route::get('/users/create', 'Admin\UsersController@getCreate')->name("user-create");
	Route::get('/users/edit/{id}', 'Admin\UsersController@getEdit');
	Route::post('/users/create', 'Admin\UsersController@create')->name("user-create");
	Route::post('/users/edit/{id}', 'Admin\UsersController@edit')->name("user-edit");
	Route::get('/users/delete/{id}', 'Admin\UsersController@delete')->name("user-delete");
	Route::get('/users/detail/{id}', 'Admin\UsersController@detail')->name("user-detail");

	Route::get('/tranformer-static', 'Admin\TranformerStaticsController@index')->name("admin-tranformer");
	Route::get('/report', 'Admin\ReportsController@index')->name("admin-report");
	Route::get('/event', 'Admin\EventsController@index')->name("admin-event");
	Route::get('/alarm', 'Admin\AlarmsController@index')->name("admin-alarm");

	Route::get('/payments', 'Admin\PaymentsController@index')->name("index-payments");
});
Auth::routes();
