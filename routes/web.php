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

Route::get('/home', 'HomeController@index');
Route::get('/home/projects','ProjectsController@index');

Route::get('/home/projects/edit/{id}',function($id) {
    $main_project=\App\Projects::find($id);
    return view('edit',['main_project' => $main_project]);
});

Route::post('/home/projects/edit/','ProjectsController@updateProject');

Route::get('/home/projects/delete/{id}','ProjectsController@deleteProject');
Route::get('/home/projects/finish/{id}','ProjectsController@finishProject');
Route::get('/home/projects/create',function() {
    return view('create');
});
Route::post('/home/projects/create','ProjectsController@createProject');


Route::get('/home/{id}', 'HomeController@getId');


Route::post('/home/{id}','ProjectsController@updateTime');




