<?php

Route::get('/', 'AuthController@getLogin')->name('login')->middleware('guest');
Route::post('/', 'AuthController@login');

Route::get('/registar', 'AuthController@getRegistar');
Route::post('/registar', 'AuthController@registar');

Route::get('/logout', 'AuthController@logout')->name('logout'); 

Route::get('home/admin', 'HomeController@getAdminHome')->middleware('admin');
Route::get('home/aluno', 'HomeController@getAlunoHome')->middleware('aluno');
Route::get('home/docente', 'HomeController@getDocenteHome')->middleware('docente');
Route::get('home/visitante', 'HomeController@getVisitanteHome');

Route::get('home/admin/utilizadores', 'HomeController@getAdminUtilizadores')->middleware('admin');
Route::get('home/admin/cursos', 'HomeController@getAdminCursos')->middleware('admin');
Route::get('home/admin/cadeiras', 'HomeController@getAdminCadeiras')->middleware('admin');
Route::get('home/admin/salas', 'HomeController@getAdminSalas')->middleware('admin');
Route::get('home/admin/ajuda', 'HomeController@getAdminAjuda')->middleware('admin');

Route::get('home/admin/utilizadorInfo/{idUtilizador}', 'InformacoesController@getUtilizadorInfo')->middleware('admin');
Route::get('home/admin/cursoInfo/{idCurso}', 'InformacoesController@getCursoInfo')->middleware('admin');
Route::get('home/admin/cadeiraInfo/{idCadeira}', 'InformacoesController@getCadeiraInfo')->middleware('admin');
Route::get('home/admin/getUtilizadores/{cargo}', 'InformacoesController@filtarUtilizadores')->middleware('admin');
Route::get('home/admin/getCadeiras/{curso}', 'InformacoesController@filtarCadeiras')->middleware('admin');

Route::get('home/cadeira/{id}', 'CadeiraController@getCadeira');

Route::get('home/cadeira/turma/{idTurma}', 'TurmaController@getTurma');
Route::get('home/cadeira/turma/inscreverTurma/{idTurma}', 'TurmaController@inscrever')->middleware('aluno');
Route::get('home/cadeira/turma/fecharTurma/{idTurma}', 'TurmaController@fecharTurma')->middleware('docente');

Route::get('home/cadeira/turma/aula/{aulaId}', 'AulaController@getAula')->middleware('docente');
Route::post('home/cadeira/turma/aula/{aulaId}/submeterPresencas', 'AulaController@submeterPresencas')->middleware('docente');

Route::post('criar/curso', 'CriacoesController@criarCurso');
Route::post('criar/cadeira', 'CriacoesController@criarCadeira');
Route::post('criar/turma/{idCadeira}', 'CriacoesController@criarTurma');
Route::post('criar/aulaTipo/{idTurma}', 'CriacoesController@criarAulaTipo');
Route::post('criar/aula', 'CriacoesController@criarAula');

Route::get('pedido/mudancaTurma/{idPedido}', 'PedidosController@aprovarMudancaTurma');
Route::post('pedido/reservaSala/criar', 'PedidosController@criarReservaSala');
Route::get('pedido/reservaSala/aprovar/{idPedido}', 'PedidosController@aprovarReservaSala');
