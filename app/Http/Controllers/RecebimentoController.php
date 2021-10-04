<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recebimento;

class RecebimentoController extends Controller
{
    public function index($id_user){
        
        $recebimentos = Recebimento::all();

        $total = 0;

        return view('recebimentos', [
            'id_user' => $id_user,
            'recebimentos' => $recebimentos,
            'total' => $total
        ]);
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        
        Recebimento::create($dados);

        return redirect()->back()->with('mensagem', 'Recebimento adicionado com Sucesso!');
    }

    public function destroy($recebimento)
    {
        $recebimento = Recebimento::find($recebimento);
        $recebimento->delete();

        return redirect()->back()->with(['mensagem' => 'Registro Excluído...']);
    }

    public function edit($recebimento)
    {
        $recebimento = Recebimento::find($recebimento);

        return view('recebimentosEdit', [
            'recebimento' => $recebimento
        ]);
    }

    public function update($recebimento, Request $request )
    {
        $dados = $request->all();
        $recebimento = Recebimento::find($recebimento);
        $recebimento->update($dados);

        return redirect()->back()->with(['mensagem' => 'Registro de recebimento editado com Sucesso!']);
    }

    
}
