<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- metas inicio -->
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escola - Home Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                <h5 class="text-white" style="text-align:center">Home Page</h5>
            </div>
            <div class="hide-large">
                <div class="container">
                    <div class="row mt-5"> 
                        <div class="col text-white mt-5">
                            <p style="text-align: justify">&nbsp;&nbsp;Esse site foi feito a ponto de demonstrar um simples sistema de CRUD, que consiste em Criar, Visualizar, Editar e Excluir dados de algum elemento possível.</p>
                        </div>                            
                        <div class="col">
                            <div class="card bg-dark">
                                <div class="card-body text-white">
                                    <p style="text-align: justify">&nbsp;&nbsp;Neste exemplo, foi utilizado o contexto de uma escola, clique no Header para visualizar as opções.
                                    <br>&nbsp;&nbsp;Ou clique em...</p>
                                    <a href="/aluno" class="btn btn-primary btn-block">Visualizar Alunos</a>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5"> 
                        <div class="col">
                            <div class="card bg-dark">
                                <div class="card-body text-white">
                                    <p style="text-align: justify">&nbsp;&nbsp;Também tem a página para Criar e Editar os dados, que você também pode achar no Header.
                                    <br>&nbsp;&nbsp;Ou clique em...</p>
                                    <a href="/aluno/create" class="btn btn-primary btn-block">Cadastrar Alunos</a>
                                </div>
                            </div>                            
                        </div>                            
                        <div class="col text-white mt-5">
                            <p style="text-align: justify">&nbsp;&nbsp;Lembrando que por ter o sistema de Migration do Laravel, a tabela do Bancos de Dados será criada assim que você hostear este projeto.</p>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>        
    </body>
</html>