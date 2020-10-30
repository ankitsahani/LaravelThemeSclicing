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
    return view('auth.login');
});



Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function(){
		Route::get('/dashboard', function () {
		    return view('admin.dashboard');
		});
		Route::get('/role.register','Admin\DashboardController@registered');

		Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');

		Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');

		Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

		Route::get('/abouts','Admin\AboutsController@index');

		Route::post('/save-abouts','Admin\AboutsController@store');

		Route::get('/abouts/{id}','Admin\AboutsController@edit');

		Route::put('/abouts-update/{id}','Admin\AboutsController@update');

		Route::delete('/abouts-delete/{id}','Admin\AboutsController@delete');


});
