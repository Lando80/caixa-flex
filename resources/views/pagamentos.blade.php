<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebimentos</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container pt-">
        @if(session()->has('mensagem'))
        <div class="alert alert-success">
            {{ session()->get('mensagem') }}
        </div>
        @endif
        <a href="/"><button class="btn btn-primary mt-4 mb-4" style="width: 80pt">Sair</button></a>
        <a href="javascript:history.back()"><button class="btn btn-primary mt-4 mb-4" style="width: 80pt">Voltar</button></a>

        <div class="border border-primary rounded px-3 py-3">
            <h4 class="mb-4">Adicionar Pagamento</h4>
            <form action="/pagamento" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group d-flex flex-row">
                    <label for="fornecedor" style="width: 80pt">Fornecedor :</label>
                    <input type="text" name="fornecedor" class="form-control input d-inline-flex">
                </div>

                <div class="form-group d-flex flex-row">
                    <label for="descricao" style="width: 80pt">Descrição :</label>
                    <input type="text" name="descricao" class="form-control">
                </div>

                <div class="form-group d-flex flex-row">
                    <label for="data" style="width: 80pt">Data :</label>
                    <input type="text" name="data" class="form-control">
                </div>

                <div class="form-group d-flex flex-row">
                    <label for="valor" style="width: 80pt">Valor :</label>
                    <input type="number" name="valor" class="form-control">
                </div>

                <div class="form-group" style="display:none">
                    <label for="usuario_id">Id_user</label>
                    <input type="text" name="usuario_id" value="{{$id_user}}" class="form-control">
                </div>
                
                <label style="width: 70pt"></label>
                <button type="submit" class="btn btn-primary" style="width: 80pt">Ok</button>
            </form>
        </div>

            <h4 class="text-center mt-4">Histórico de Pagamentos</h4>
            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th style="width: 140pt">#</th>
                        <th>Fornecedor</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pagamentos as $pagamento)
                        @if ($pagamento->usuario_id == $id_user)
                            <?php 
                                $total += $pagamento->valor;
                            ?> 
                            <tr>
                                <td>
                                    {{ $pagamento->id }}
                                    <a href="/pagamento/{{ $pagamento->id }}/edit" class="btn btn-info btn-sm">Editar</a>
                            
                                    <form   action="/pagamento/{{ $pagamento->id }}"
                                    method="POST"
                                    class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>

                                </td>
                                <td>{{ $pagamento->fornecedor }}</td>
                                <td>{{ $pagamento->descricao }}</td>
                                <td>{{ $pagamento->data }}</td>
                                <td>{{ $pagamento->valor }}</td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total ----></strong></td>
                                <td><strong>{{ $total }}</strong></td>
                            </tr>
                </tbody>

            </table>


        

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js" integrity="sha512-mVkLPLQVfOWLRlC2ZJuyX5+0XrTlbW2cyAwyqgPkLGxhoaHNSWesYMlcUjX8X+k45YB8q90s88O7sos86636NQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>