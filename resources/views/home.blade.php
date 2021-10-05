<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body> 
    <?php
    $nome = $_POST['email'];
    ?>

    <div class="container px-3 py-3 mt-5 border border-primary rounded px-3 py-3 text-center"
        style="width: 300pt">

        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif
        <div class="btn border border-success mb-3" style="width: 250pt">
            <p>DASHBORAD DO USUARIO</p>
            <h2 class="mb-3">{{ $usuario->nome }} </h2>
        </div>

        <div class="form-group btn btn-outline-success" style="width: 250pt">
            <label for="emai">Total de Recebimentos</label><br>
                @foreach ($recebimentos as $recebimento)
                    @if($recebimento->usuario_id == $usuario->id)
                        <?php
                            $totalRecebido += $recebimento->valor
                        ?>
                    @endif
                @endforeach
            <label >R$ {{ $totalRecebido }} </label><br>
            <a href="/recebimento/{{ $usuario->id }}"><button class="btn btn-primary" style="width: 140pt">Ir para recebimentos</button></a>
        </div>
        
        <div class="form-group btn btn-outline-success" style="width: 250pt">
            <label for="senha">Total de Pagamentos</label><br>
                @foreach ($pagamentos as $pagamento)
                    @if($pagamento->usuario_id == $usuario->id)
                        <?php
                            $totalPago += $pagamento->valor
                        ?>
                    @endif
                @endforeach


            <label >R$ {{ $totalPago }} </label><br>
            <a href="/pagamento/{{ $usuario->id }}"><button class="btn btn-primary" style="width: 160pt">Ir para pagamentos</button></a>
        </div>
        <br>
        <div class="form-group btn btn-outline-success" style="width: 250pt">
            <label for="senha"><strong>Saldo</strong></label><br>
            <label >R$ {{ $totalRecebido - $totalPago }} </label><br>
        </div>
        <br>
        <a href="/"><button class="btn btn-primary" style="width: 160; width: 80pt">Sair</button></a>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js" integrity="sha512-mVkLPLQVfOWLRlC2ZJuyX5+0XrTlbW2cyAwyqgPkLGxhoaHNSWesYMlcUjX8X+k45YB8q90s88O7sos86636NQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</body>
</html>