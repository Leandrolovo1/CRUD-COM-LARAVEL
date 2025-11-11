<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinasController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

route::resource('/aluno', AlunoController::class);

route::resource('/curso', CursoController::class);

route::resource('/disciplina', DisciplinasController::class);


route::get('/principal', [MainController::class, 'index']);
