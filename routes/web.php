<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecebimentoController;

Route::get('/pagamento', function () {
    return view('pagamentos');
});

Route::get('user/create', [UserController::class, 'create']); // cadastro dos usuarios
Route::post('/', [UserController::class, 'store']);
Route::get('/', [UserController::class, 'login']);
Route::post('/home', [UserController::class, 'home']);

Route::get('/recebimento/{id_usuario}', [RecebimentoController::class, 'index']); //aproveitei esta rota para visualizar e criar os registros, deletei a rota create ref. a recebimentos
Route::post('/recebimento', [RecebimentoController::class, 'store']);

Route::get('/recebimento/{recebimento}/edit', [RecebimentoController::class, 'edit']);
Route::put('/recebimento/{recebimento}', [RecebimentoController::class, 'update']);
Route::delete('/recebimento/{recebimento}', [RecebimentoController::class, 'destroy']);