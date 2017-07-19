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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'TodosController@index');
Route::get('api/tasks', function() {
	return [
		0 => App\Todo::where('status', 0)->get(),
		1 => App\Todo::where('status', 1)->get(),
		2 => App\Todo::where('status', 2)->get()

	];
});
Route::get('tasks/create', 'TodosController@create');
Route::post('tasks', 'TodosController@store');
Route::patch('tasks/{todo}', 'TodosController@update');
Route::patch('tasks/{todo}/{status}', 'TodosController@update');
Route::delete('tasks/{todo}', 'TodosController@destroy');
