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
Route::resource('task', 'TaskController');


Route::get('/',function(){
    return redirect()->route('task.index');
});

Route::get('tasks/archive/{id}/{state}', 'TaskController@archive')->name('tasks.archive');

