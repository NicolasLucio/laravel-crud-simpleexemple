<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- metas inicio -->
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escola - Cadastrar</title>
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
                <h5 class="text-white" style="text-align:center" >Cadastrar um Novo Aluno</h5>
            </div>
            <div class="hide-large">    
            <div class="card text-white bg-dark mt-2">
                <div class="card-body">
                    <div id="msg">
                    </div>  
                    <form name="cadastro" onsubmit="return false;" >
                        @csrf
                        @method('head')
                        <input name="id" type="hidden" value="{{ (isset($infoAluno[0]->id))? $infoAluno[0]->id : 0 }}">
                        <div class="form-group">
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control" value="{{ (isset($infoAluno[0]->nome))? $infoAluno[0]->nome : '' }}" name="inputNome" value="" placeholder="Nome" size="100">
                        </div>                    
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputNasc">Data de Nascimento</label>
                                <input type="date" class="form-control" value="{{ (isset($infoAluno[0]->nascimento))? $infoAluno[0]->nascimento : '' }}"name="inputNasc" placeholder="Data">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputSerie">Série</label>
                                <select class="form-control" name="inputSerie">
                                    <option value="0" selected>---</option>
                                    <option value="1">1º Série</option>
                                    <option value="2">2º Série</option>
                                    <option value="3">3º Série</option>
                                    <option value="4">4º Série</option>
                                    <option value="5">5º Série</option>
                                    <option value="6">6º Série</option>
                                    <option value="7">7º Série</option>
                                    <option value="8">8º Série</option>
                                    <option value="9">9º Série</option>
                                </select>                            
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCEP">CEP</label>
                                <input type="number" maxlength="8" size ="8" class="form-control" value="{{ (isset($infoAluno[0]->cep))? $infoAluno[0]->cep : '' }}" name="inputCEP" placeholder="CEP">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="inputEnd">Endereço</label>
                                <input type="" class="form-control" value="{{ (isset($infoAluno[0]->rua))? $infoAluno[0]->rua : '' }}" name="inputEnd" placeholder="Endereço">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputNum">Número</label>
                                <input type="number" class="form-control" value="{{ (isset($infoAluno[0]->numero))? $infoAluno[0]->numero : '' }}" name="inputNum" placeholder="Número">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputComp">Complemento</label>
                            <input type="text" class="form-control" value="{{ (isset($infoAluno[0]->complemento))? $infoAluno[0]->complemento : '' }}"name="inputComp" placeholder="Complemento">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputBairro">Bairro</label>
                                <input type="text" class="form-control" value="{{ (isset($infoAluno[0]->bairro))? $infoAluno[0]->bairro : '' }}" name="inputBairro" placeholder="Bairro">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCidade">Cidade</label>
                                <input type="text" class="form-control" value="{{ (isset($infoAluno[0]->cidade))? $infoAluno[0]->cidade : '' }}" name="inputCidade" placeholder="Cidade">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputEst">Estado</label>
                                <select class="form-control" name="inputEst">
                                    <option value="0" selected>---</option>
                                    <option value="Acre">AC</option>
                                    <option value="Alagoas">AL</option>
                                    <option value="Amapá">AP</option>
                                    <option value="Amazonas">AM</option>
                                    <option value="Bahia">BA</option>
                                    <option value="Ceará">CE</option>
                                    <option value="Distrito Federal">DF</option>
                                    <option value="Espírito Santo">ES</option>
                                    <option value="Goiás">GO</option>
                                    <option value="Maranhão">MA</option>
                                    <option value="Mato Grosso">MT</option>
                                    <option value="Mato Grosso do Sul">MS</option>
                                    <option value="Minas Gerais">MG</option>
                                    <option value="Pará">PA</option>
                                    <option value="Paraíba">PB</option>
                                    <option value="Paraná">PR</option>
                                    <option value="Pernambuco">PE</option>
                                    <option value="Piauí">PI</option>
                                    <option value="Rio de Janeiro">RJ</option>
                                    <option value="Rio Grande do Norte">RN</option>
                                    <option value="Rio Grande do Sul">RS</option>
                                    <option value="Rondônia">RO</option>
                                    <option value="Roraima">RR</option>
                                    <option value="Santa Catarina">SC</option>
                                    <option value="São Paulo">SP</option>
                                    <option value="Sergipe">SE</option>
                                    <option value="Tocatins">TO</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label for="inputNomeM">Nome da Mãe</label>
                                <input type="text" class="form-control" value="{{ (isset($infoAluno[0]->nomemae))? $infoAluno[0]->nomemae : '' }}" name="inputNomeM" placeholder="Nome da Mãe">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCPFM">CPF da Mãe</label>
                                <input type="number" class="form-control" value="{{ (isset($infoAluno[0]->cpfmae))? $infoAluno[0]->cpfmae : '' }}" name="inputCPFM" placeholder="CPF da Mãe">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-md-3">
                            <label for="inputDataPref">Data Preferencial para o Pagamento</label>
                            <input type="number" value="{{ (isset($infoAluno[0]->datapref))? $infoAluno[0]->datapref : '' }}" name="inputDataPref" class="form-control mx-sm-2" aria-describedby="dataPrefInline">
                            <small id="dataPrefInline" class="text-muted">
                                Informações sobre a data.
                            </small>
                        </div>
                        <hr>
                        <div align="right">
                                <a href="/" class="btn btn-info">Voltar</a> 
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>

                    <script>           

                    $(function(){

                        var formulario = $("[name=cadastro]");

                        $("[name=inputSerie]").find("option[value='{{ (isset($infoAluno[0]->serie))?  $infoAluno[0]->serie : 0 }}']").attr({"selected": true});

                        $("[name=inputEst]").find("option[value='{{ (isset($infoAluno[0]->estado))?  $infoAluno[0]->estado : 0 }}']").attr({"selected": true});

                        $("[name=inputNome]").on("keyup", function(){
                            validarNumerodeCaracteres(this, 10, 100);
                        });

                        $("[name=inputCEP]").on("keyup", function(){
                            validarNumerodeCaracteres(this, 8, 8);
                        });

                        $("[name=inputEnd]").on("keyup", function(){
                            validarNumerodeCaracteres(this, 5 , 120);                            
                        });

                        $("[name=inputComp]").on("keyup", function(){
                            validarNumerodeCaracteres(this, 0, 50);                            
                        });

                        $("[name=inputBairro]").on("keyup", function(){
                            validarNumerodeCaracteres(this, 0, 100);                            
                        });

                        $("[name=inputCidade]").on("keyup", function(){
                            validarNumerodeCaracteres(this, 0, 50);                            
                        });

                        $("[name=inputNomeM]").on("keyup", function(){
                            validarNumerodeCaracteres(this, 10, 100);
                        });

                        $("[name=inputNum").on("keyup", function(){
                            validarNumerodeCaracteres(this, 1, 5);
                        });

                        $("[name=inputCPFM]").on("keyup", function(){

                            let cpf = this.value.replace(/\D/g, "");

                            if(validarCPF(cpf))
                            {
                                $(this).removeClass("is-invalid");
                                $(this).addClass("is-valid");
                            }
                            else
                            {
                                $(this).addClass("is-invalid");
                                $(this).removeClass("is-valid");
                            }
                        });

                        $("[name=inputDataPref]").on("keyup", function(){
                            if (this.value < 1 || this.value > 28)
                            {
                                $(this).addClass("is-invalid");
                                $(this).removeClass("is-valid");
                            }
                            else
                            {
                                $(this).removeClass("is-invalid");
                                $(this).addClass("is-valid");
                            }
                        });

                        formulario.on("submit", function(){
                            let dados = formulario.serializeArray();
                            $.ajax({
                                method: "POST",
                                data: dados,
                                dataType: "json",
                                success: function(req){
                                    $("#msg").html(req["msg"]);
                                },
                                error: function(req){
                                    if (typeof req == "object")
                                    {
                                        $("#msg").html(req["responseJSON"]["msg"]);
                                    }
                                }
                            });    
                            return false;
                        });

                    });

                    function validarNumerodeCaracteres(elemento, min = 0, max = 0)
                    {
                        elemento = $(elemento);

                        if(elemento.val().length < min || elemento.val().length > max)
                        {
                            $(elemento).addClass("is-invalid");
                            $(elemento).removeClass("is-valid");
                        }
                        else
                        {
                            $(elemento).removeClass("is-invalid");
                            $(elemento).addClass("is-valid");
                        }
                    }

                    function validarCPF(strCPF)
                    {
                        let 
                            Soma,
                            Resto,
                            i;

                        Soma = 0;

                        if (strCPF == "00000000000") return false;
                            
                        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
                        Resto = (Soma * 10) % 11;
                            
                        if ((Resto == 10) || (Resto == 11))  Resto = 0;
                        if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
                            
                        Soma = 0;
                        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
                        Resto = (Soma * 10) % 11;
                            
                        if ((Resto == 10) || (Resto == 11))  Resto = 0;
                        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
                        return true;
                    }

                    </script>
                </div>  
            </div>
            </div>    
        </div>        
    </body>
</html>