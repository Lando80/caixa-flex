<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecebimentoController;


//Route::get('/recebimentos/{usuario}', function () {
//    return view('recebimentos');
//});

Route::get('/pagamento', function () {
    return view('pagamentos');
});

Route::get('user/create', [UserController::class, 'create']); // cadastro dos usuarios

Route::post('/', [UserController::class, 'store']);

Route::get('/', [UserController::class, 'login']);

Route::post('/home', [UserController::class, 'home']);

Route::get('/recebimento/{id_usuario}', [RecebimentoController::class, 'index']);

