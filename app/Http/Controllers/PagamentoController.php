<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pagamento;

class PagamentoController extends Controller
{
    public function index($id_user){ //também é usado para criar registros de pagamentos
        
        $pagamentos = Pagamento::all();

        $total = 0;

        return view('pagamentos', [
            'id_user' => $id_user,
            'pagamentos' => $pagamentos,
            'total' => $total
        ]);
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        
        Pagamento::create($dados);

        return redirect()->back()->with('mensagem', 'Pagamento adicionado com Sucesso!');
    }

    public function destroy($pagamentos)
    {
        $pagamentos = Pagamento::find($pagamentos);
        $pagamentos->delete();

        return redirect()->back()->with(['mensagem' => 'Registro de Pagamento Excluído...']);
    }

    public function edit($pagamentos)
    {
        $pagamentos = Pagamento::find($pagamentos);

        return view('pagamentosEdit', [
            'pagamentos' => $pagamentos
        ]);
    }

    public function update($pagamentos, Request $request )
    {
        $dados = $request->all();
        $pagamentos = Pagamento::find($pagamentos);
        $pagamentos->update($dados);

        return redirect()->back()->with(['mensagem' => 'Registro de pagamento editado com Sucesso!']);
    }



}
