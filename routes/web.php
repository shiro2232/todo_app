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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//タスク関係
Route::get('/task/list', 'TaskController@taskListShow')->name('taskListShow');
Route::get('/task/add', 'TaskController@addTaskShow')->name('addTaskShow');
Route::post('/task/add', 'TaskController@addTask')->name('addTask');