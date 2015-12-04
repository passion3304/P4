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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/practice', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Practice';

});

/*----------------------------------------------------
/tasks
-----------------------------------------------------*/
Route::get('/', 'WelcomeController@getIndex');
Route::get('/tasks/create', 'taskController@getCreate');
Route::post('/tasks/create', 'taskController@postCreate');
Route::get('/tasks/edit/{id?}', 'taskController@getEdit');
Route::post('/tasks/edit', 'taskController@postEdit');
Route::get('/tasks/confirm-delete/{id?}', 'taskController@getConfirmDelete');
Route::get('/tasks/delete/{id?}', 'taskController@getDoDelete');
Route::get('/tasks', 'taskController@getIndex');
Route::get('/tasks/show/{title?}', 'taskController@getShow');