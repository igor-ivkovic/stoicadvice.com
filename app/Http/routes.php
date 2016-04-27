<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



	Route::get('/', 'WelcomeController@index');

    Route::post('/', 'WelcomeController@newone');


	Route::get('home', 'HomeController@index');

	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);

	Route::post('home', 'HomeController@store');

	Route::post('cms/update', 'HomeController@edit');


	Route::post('cms/overwrite', 'HomeController@overwrite');

	Route::post('cms/delete', 'HomeController@delete');


// Route::get('auth/register', 'HomeController@register');


	Route::get('/{id}', 'WelcomeController@check')->where('id', '[0-9]+');

    Route::get('about', 'WelcomeController@about');


