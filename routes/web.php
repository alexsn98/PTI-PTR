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

Route::get('home/admin', 'HomeController@adminHome')->middleware('admin');
Route::get('home/aluno', 'HomeController@alunoHome')->middleware('aluno');
Route::get('home/docente', 'HomeController@docenteHome')->middleware('docente');

Route::get('/inscreverTurma', 'turmaController@getInscrever')->middleware('aluno');
Route::post('/inscreverTurma', 'turmaController@inscrever')->middleware('aluno');
