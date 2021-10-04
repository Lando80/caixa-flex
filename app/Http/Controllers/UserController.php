<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Recebimento;
use App\Models\Pagamento;

class UserController extends Controller
{
    public function create()
    {
        $users = User::all();

        return view('cadastroUser', [
            'users' => $users
        ]);
    }
    //=======================================

    public function store(Request $request)
    {
        $dados = $request->all();
        
        User::create($dados);

        return redirect()->back()->with('mensagem', 'Usuário criado com Sucesso!');
    }

    //=======================================
    
    public function login()
    {
        $users = User::all();

        return view('login', ['users' => $users]);
    }

    //=======================================
    
    public function home(Request $request)
    {
        $dados = $request->all();
        $users = User::all();

        $acheiEmail = false;
        $acheiSenha = false;
        $usuario ='';

        $recebimentos = Recebimento::all();
        $totalRecebido = 0;

        $pagamentos = Pagamento::all();
        $totalPago = 0;
    
        $acheiEmailSenha = false;
    
        foreach($users as $user){
            $tempEmail = $user->email;
            $tempSenha = $user->senha;
            
            if(($tempEmail == $dados["email"]) && ($tempSenha == $dados["senha"])){
                $acheiEmailSenha = true;
                $acheiId = $user->id;
                $usuario = $user;
            }
        }
        
        if ($acheiEmailSenha){

        //    dd($usuario, $totalRecebido, $recebimentos);
            
            return view ('home', [
                'usuario' => $usuario,
                'recebimentos' => $recebimentos,
                'totalRecebido' => $totalRecebido,
                'pagamentos' => $pagamentos,
                'totalPago' => $totalPago
            ]);
        }else{
            return redirect()->back()->with('mensagem', 'Usuário ou senha incorreta!!');
        }
    }

    //=======================================

}
