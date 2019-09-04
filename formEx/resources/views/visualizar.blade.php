<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- metas inicio -->
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escola - Alunos</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- header inicio --> 
        <div class="container-fluid shadow navbar-dark bg-dark">
            <nav class="navbar container navbar-expand-lg">
                <a class="navbar-brand" href="/"><b>Escola</b></a>
                <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i></i>
                </button>
                <div class="collapse navbar-collapse ml-3" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">                        
                        <li class="nav-item">
                            <a class="nav-link" href="/aluno">Alunos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/aluno/create">Cadastrar</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </head>
    <body class="bg-secondary">        
        <div class="container mt-5 mb-5">
            <div class="p-2" style="word-wrap: break-word">
                <h5 class="text-white" style="text-align:center">Lista de Alunos Cadastrados</h5>                
            </div>
            <div class="hide-large">
            <div class="mt-5">     
                <a href="/aluno/create" class="btn btn-primary btn-block">Adicionar novo aluno</a>           
                <table class="table table-dark table-hover mt-1">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Serie atual</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>                
                        <!-- foreach para visualização do banco de dados -->
                        @foreach ($objBD as $estudante)                                                
                            <tr>
                                <th scope="row"> {{ $estudante->nome }} </th>
                                <td> {{ $estudante->nascimento }} </td>
                                <td> {{ $estudante->serie }}º Série</td>
                                <td>                                     
                                    <a href="javascript:void(0)" data-aluno-id="{{ $estudante->id }}" class="btn btn-primary btn-sm active visualizar" role="button" aria-pressed="true">Visualizar</a>
                                    <a href="/aluno/{{ $estudante->id }}/edit" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Editar</a>
                                    <a href="javascript:void(0)" data-aluno-id="{{ $estudante->id }}" class="btn btn-danger btn-sm active deletar" role="button" aria-pressed="true">Deletar</a>
                                </td>
                            </tr>                             
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- modal -->
            <div class="modal" id="modalAluno" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>Dados do Aluno</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><b>Nome: </b><span id="alunoNome"></span></p>
                        <p><b>Data de Nascimento: </b><span id="alunoData"></span></p>
                        <p><b>Série: </b><span id="alunoSerie"></span>º Série</p>
                        <p><b>CEP: </b><span id="alunoCEP"></span></p>
                        <hr>
                        <p><b>Endereço: </b><span id="alunoEnd"></span></p>
                        <p><b>Numero: </b><span id="alunoNum"></span></p>
                        <p><b>Complemento: </b><span id="alunoComp"></span></p>
                        <p><b>Bairro: </b><span id="alunoBairro"></span></p>
                        <p><b>Cidade: </b><span id="alunoCidade"></span></p>
                        <p><b>Estado: </b><span id="alunoEst"></span></p>
                        <hr>
                        <p><b>Nome da Mãe: </b><span id="alunoNomeM"></span></p>
                        <p><b>CPF da Mãe: </b><span id="alunoCPFM"></span></p>
                        <hr>
                        <p><b>Data Preferencial para Pagamento: </b><span id="alunoDataPref"></span></p>
                        <hr>
                        <p style="text-align: right;"><i>Cadastrado em <span id="alunoCas"></span></i></p>
                        <p style="text-align: right;"><i>Atualizado em <span id="alunoAtt"></span></i></p>
                    </div>
                    </div>
                </div>
            </div>
            <script>
                $(function(){

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $(".visualizar").on("click", function(){
                        let id = $(this).attr("data-aluno-id");
                        if (id != "" && id > 0)
                        {
                            $.ajax({
                                url: "/aluno/"+id,
                                method: 'GET',
                                dataType: "json",
                                success: function(req){
                                    console.log(req);
                                    $("#alunoNome").html(req[0]["nome"]);
                                    $("#alunoData").html(req[0]["nascimento"]);
                                    $("#alunoSerie").html(req[0]["serie"]);
                                    $("#alunoCEP").html(req[0]["cep"]);
                                    $("#alunoEnd").html(req[0]["rua"]);
                                    $("#alunoNum").html(req[0]["numero"]);
                                    $("#alunoComp").html(req[0]["complemento"]);
                                    $("#alunoBairro").html(req[0]["bairro"]);
                                    $("#alunoCidade").html(req[0]["cidade"]);
                                    $("#alunoEst").html(req[0]["estado"]);
                                    $("#alunoNomeM").html(req[0]["nomemae"]);
                                    $("#alunoCPFM").html(req[0]["cpfmae"]);
                                    $("#alunoDataPref").html(req[0]["datapref"]);
                                    $("#alunoCas").html(req[0]["created_at"]);
                                    $("#alunoAtt").html(req[0]["updated_at"]);
                                    $('#modalAluno').modal('toggle');
                                }
                            });
                        }
                    });

                    $(".deletar").on("click", function(){
                        let id = $(this).attr("data-aluno-id");

                        if (id != "" && id > 0)
                        {
                            $.ajax({
                                url: "/aluno/"+id,
                                method: 'DELETE',
                                success: function(){
                                    window.location.reload();
                                }
                            });
                        }
                    });

                });
            </script>
        </div>        
    </body>
</html>