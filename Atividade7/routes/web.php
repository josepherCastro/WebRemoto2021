<?php

use Illuminate\Support\Facades\Route;

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
})->name('HOME')->middleware('auth');

Route::resource('curso','CursoController')->middleware('AccessLevel');
Route::resource('professor','ProfessorController')->middleware('AccessLevel');
Route::resource('disciplina','DisciplinaController')->middleware('AccessLevel');
Route::resource('aluno','AlunoController')->middleware('AccessLevel');
Route::resource('matricula','MatriculaController');

Route::get('negado','NegadoController@index')->name('negado');

Auth::routes();
