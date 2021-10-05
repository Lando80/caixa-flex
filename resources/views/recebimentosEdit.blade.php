<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <title>Editar Registro de Recebimentos</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body>
    <div class="container pt-">
        
        <a href="/recebimento/{{$recebimento->usuario_id}}"><button class="btn btn-primary mt-4 mb-4" style="width: 80pt">Voltar</button></a>
        
        @if(session()->has('mensagem'))
        <div class="alert alert-success">
            {{ session()->get('mensagem') }}
        </div>/recebimento/{{$recebimento->id }}
        @endif
        
        <div class="border border-primary rounded px-3 py-3">
            
        <h4 class="mb-4">Editar Recebimento</h4> {{$recebimento->cliente}}

        <form action="" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="form-group d-flex flex-row">
                <label for="cliente" style="width: 70pt">Cliente :</label>
                <input type="text" name="cliente" class="form-control input d-inline-flex" value="{{ $recebimento->cliente }}">
            </div>

            <div class="form-group d-flex flex-row">
                <label for="descricao" style="width: 70pt">Descrição :</label>
                <input type="text" name="descricao" class="form-control" value="{{ $recebimento->descricao }}">
            </div>

            <div class="form-group d-flex flex-row">
                <label for="data" style="width: 70pt">Data :</label>
                <input type="text" name="data" class="form-control"value="{{ $recebimento->data }}">
            </div>

            <div class="form-group d-flex flex-row">
                <label for="valor" style="width: 70pt">Valor :</label>
                <input type="number" name="valor" class="form-control" value="{{ $recebimento->valor }}">
            </div>

            <label style="width: 60pt"></label>
            <button type="submit" class="btn btn-primary" style="width: 80pt">Salvar</button>
            
        </form>

        </div>
        

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js" integrity="sha512-mVkLPLQVfOWLRlC2ZJuyX5+0XrTlbW2cyAwyqgPkLGxhoaHNSWesYMlcUjX8X+k45YB8q90s88O7sos86636NQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
</body>
</html>