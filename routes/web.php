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

Route::get('/', 'AuthController@getLogin')->name('login')->middleware('guest');
Route::post('/', 'AuthController@login');

Route::get('/registar', 'AuthController@getRegistar');
Route::post('/registar', 'AuthController@registar');

Route::get('/logout', 'AuthController@logout')->name('logout'); 

Route::get('home/admin', 'HomeController@getAdminHome')->middleware('admin');
Route::get('home/aluno', 'HomeController@getAlunoHome')->middleware('aluno');
Route::get('home/docente', 'HomeController@getDocenteHome')->middleware('docente');
Route::get('home/visitante', 'HomeController@getVisitanteHome');

Route::get('home/admin/utilizadores', 'HomeController@getAdminUsers')->middleware('admin');

Route::get('home/cadeira/{id}', 'CadeiraController@getCadeira');

Route::get('home/cadeira/turma/{idTurma}', 'TurmaController@getTurma');
Route::get('home/cadeira/turma/inscreverTurma/{idTurma}', 'TurmaController@inscrever')->middleware('aluno');


Route::post('criar/curso', 'CriacoesController@criarCurso');
Route::post('criar/cadeira', 'CriacoesController@criarCadeira');
Route::post('criar/turma/{idCadeira}', 'CriacoesController@criarTurma');
Route::post('criar/aulaTipo/{idTurma}', 'CriacoesController@criarAulaTipo');

Route::get('pedido/mudancaTurma/{idPedido}', 'PedidosController@aprovarMudancaTurma');
Route::post('pedido/reservaSala/criar', 'PedidosController@criarReservaSala');
Route::get('pedido/reservaSala/aprovar/{idPedido}', 'PedidosController@aprovarReservaSala');
