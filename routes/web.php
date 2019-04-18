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

Route::get('/',['uses'=>'Controller@fazerlogin']);
Route::get('/cadastro',['uses'=>'Controller@cadastro']);

/**
 * rota para controler de login
 */
Route::get('/login',['uses'=>'Controller@fazerlogin']);
Route::post('/login',['as'=>'user.login','uses'=>'DashboardControler@auth']);
Route::get('/dashboard',['as'=>'user.dashboard','uses'=>'DashboardControler@index']);

Route::get('user',['as' =>'user.index','uses' => 'UsersController@index']);

Route::resource('user','UsersController');
Route::resource('instituiton','InstituitionsController');
Route::resource('group','GroupsController');


Route::post('group/{group_id}/user',['as'=> 'group.user.store', 'uses' => 'GroupsController@userStore']);
