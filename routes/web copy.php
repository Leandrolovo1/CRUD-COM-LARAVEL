<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinasController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

route::resource('/ordemServicos', AlunoController::class);

route::resource('/clientes', CursoController::class);

route::get('/principal', [MainController::class, 'index']);
