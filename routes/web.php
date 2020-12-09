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

// Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/top', 'HomeController@top')->name('top');
// Route::get('/', 'HomeController@index');
Route::get('/class', 'HomeController@class')->name('class');
Route::get('/class-recommend', 'HomeController@classRecommend')->name('class-recommend');
Route::get('/profile', 'HomeController@getProfile')->name('profile')->middleware('auth');
Route::post('/profile', 'HomeController@profile')->name('profile')->middleware('auth');
Route::get('/change-password', 'HomeController@getPassword')->name('change-password')
	->middleware('auth');
Route::post('/change-password', 'HomeController@changePassword')->name('change-password')
	->middleware('auth');
Route::get('/class/register', 'HomeController@register')->name('class-register')
	->middleware('auth');
Route::get("/logout", "Auth\LoginController@logout");

Route::get('bac-a/c11', 'BacAController@busbarc11');
Route::get('bac-a/c31', 'BacAController@busbarc31');
Route::get('bac-a/c12', 'BacAController@busbarc12');
Route::get('bac-a/tranformer', 'BacAController@tranformer');
Route::middleware('auth')->group(function () {
	Route::get('tba/hung-nguyen', 'HomeController@hungNguyen')->name('hung-nguyen-index');
	Route::get('tba/bac-a', 'HomeController@bacA')->name('bac-a-index');
	Route::get('mba/{name}', 'TransformersController@index')->name('mba-index');
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
	Route::get('/users/upload', 'Admin\UsersController@getUpload')->name("user-upload");
	Route::post('/users/upload', 'Admin\UsersController@postUpload')->name("user-upload");
	//classes
	Route::get('/classes', 'Admin\ClassesController@index')->name("index-classes");
	Route::get('/classes/add', 'Admin\ClassesController@getAdd')->name("class-add");
	Route::post('/classes/add', 'Admin\ClassesController@add')->name("class-add");
	Route::get('/classes/edit/{id}', 'Admin\ClassesController@getEdit')->name("class-edit");
	Route::post('/classes/edit/{id}', 'Admin\ClassesController@edit')->name("class-edit");
	Route::get('/classes/detail/{id}', 'Admin\ClassesController@detail')->name("class-detail");
	Route::get('/classes/delete/{id}', 'Admin\ClassesController@delete')->name("class-delete");
	// major
	Route::get('/majors', 'Admin\MajorsController@index')->name("index-majors");
	Route::get('/majors/add', 'Admin\MajorsController@getAdd')->name("major-add");
	Route::post('/majors/add', 'Admin\MajorsController@add')->name("major-add");
	Route::get('/majors/edit/{id}', 'Admin\MajorsController@getEdit')->name("major-edit");
	Route::post('/majors/edit/{id}', 'Admin\MajorsController@edit')->name("major-edit");
	Route::get('/majors/detail/{id}', 'Admin\MajorsController@detail')->name("major-detail");
	Route::get('/majors/delete/{id}', 'Admin\MajorsController@delete')->name("major-delete");


	Route::get('/payments', 'Admin\PaymentsController@index')->name("index-payments");
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
