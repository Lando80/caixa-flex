<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecebimentoController extends Controller
{
    public function index($id_user){
     //   echo "Recebimentos do usuário $id_user";

        return view('recebimentos', [
            'id_user' => $id_user
        ]);
    }
}
