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

Route::get('/', [
	'uses' => 'TasksController@getWelcome',
	'as' => 'welcome'
]);

Route::group([
	'middleware' => ['auth']
], function(){
	Route::get('/edit/{id}', [
		'uses' => 'TasksController@getEditTask',
		'as' => 'getEditTask'
	]);

	Route::get('/delete/{id}', [
		'uses' => 'TasksController@getDeleteTask',
		'as' => 'getDeleteTask'
	]);

	Route::post('/createTask', [
		'uses' => 'TasksController@postCreateTask',
		'as' => 'postCreateTask'
	]);

	Route::post('/editTask', [
		'uses' => 'TasksController@postEditTask',
		'as' => 'postEditTask'
	]);
});

Auth::routes();

