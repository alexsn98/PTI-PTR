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

Route::get('/', 'AuthController@getLogin')->name('login');
Route::post('/', 'AuthController@login');

Route::get('/registar', 'AuthController@getRegistar');
Route::post('/registar', 'AuthController@registar');

Route::get('/logout', 'AuthController@logout')->name('logout'); 

Route::get('/home/admin', function() {return view('adminHome');})->middleware('auth');

Route::get('/home/aluno', function() {return view('alunoHome');})->middleware('auth');

Route::get('/home/docente', function() {return view('docenteHome');})->middleware('auth');;