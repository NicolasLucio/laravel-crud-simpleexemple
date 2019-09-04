<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class acesso extends Controller
{
    private $req = array();
    private $dados = null;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        
        $objBD = DB::table("alunos_migration")->get();        
        return view('visualizar', ['objBD'=> $objBD]);       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if ($request->isMethod('head'))
        {
            $this->req["status"] = 0;
            $this->req["msg"] = null;

            $this->dados = $request->all();

            $this->validarDados();

            if ($this->req["status"] === 0 and $this->req["msg"] === null)
            {
                date_default_timezone_set("America/Sao_Paulo");
                DB::table("alunos_migration")->insert([
                    [
                        "nome"=>$this->dados["inputNome"],
                        "nascimento"=>$this->dados["inputNasc"],
                        "serie"=>$this->dados["inputSerie"],
                        "cep"=>$this->dados["inputCEP"],
                        "rua"=>$this->dados["inputEnd"],
                        "numero"=>$this->dados["inputNum"],
                        "complemento"=>$this->dados["inputComp"],
                        "bairro"=>$this->dados["inputBairro"],
                        "cidade"=>$this->dados["inputCidade"],
                        "estado"=>$this->dados["inputEst"],
                        "nomemae"=>$this->dados["inputNomeM"],
                        "cpfmae"=>$this->dados["inputCPFM"],
                        "datapref"=>$this->dados["inputDataPref"],
                        "created_at"=>date("Y-m-d H:i:s")
                    ]
                ]);
                $this->req["msg"] = "Cadastrado com Sucesso";
                echo json_encode($this->req);
            }
            else
            {
                echo json_encode($this->req);
                abort(403, 'Unauthorized action.');
            }
        }
        else
        {
            return view('criar');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $objBD = DB::table("alunos_migration")->where('id', $id)->get();
        echo json_encode($objBD);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->isMethod('head'))
        {
            $this->req["status"] = 0;
            $this->req["msg"] = null;

            $this->dados = $request->all();

            $this->validarDados();

            if($this->dados["id"] == 0)
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "ID invalido<br>";
            }

            if ($this->req["status"] === 0 and $this->req["msg"] === null)
            {
                date_default_timezone_set("America/Sao_Paulo");
                DB::table("alunos_migration")->where("id", $this->dados["id"])->update(
                    [
                        "nome"=>$this->dados["inputNome"],
                        "nascimento"=>$this->dados["inputNasc"],
                        "serie"=>$this->dados["inputSerie"],
                        "cep"=>$this->dados["inputCEP"],
                        "rua"=>$this->dados["inputEnd"],
                        "numero"=>$this->dados["inputNum"],
                        "complemento"=>$this->dados["inputComp"],
                        "bairro"=>$this->dados["inputBairro"],
                        "cidade"=>$this->dados["inputCidade"],
                        "estado"=>$this->dados["inputEst"],
                        "nomemae"=>$this->dados["inputNomeM"],
                        "cpfmae"=>$this->dados["inputCPFM"],
                        "datapref"=>$this->dados["inputDataPref"],
                        "updated_at"=>date("Y-m-d H:i:s")
                    ]
                );
                $this->req["msg"] = "Atualizado com Sucesso";
                echo json_encode($this->req);
            }
            else
            {
                echo json_encode($this->req);
                abort(403, 'Unauthorized action.');
            }
        }
        else
        {
            $objBD = DB::table("alunos_migration")->where('id', $id)->get();
            return view("criar", ["infoAluno"=>$objBD]);
        }
    }

    private function validarDados()
    {
        if($this->dados != null)
        {

            if (!isset($this->dados) or count($this->dados) != 16)
            {
                abort(403, 'Unauthorized action.');
                exit();
            }

            if(!isset($this->dados["inputNome"]) or strlen($this->dados["inputNome"]) > 100)
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "Nome Inválido <br>";
            }

            if(!isset($this->dados["inputNasc"]))
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "Data de Nascimento Inválido<br>";
            }

            if(!isset($this->dados["inputCEP"]) or strlen($this->dados["inputCEP"]) != 8)
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "CEP Inválido<br>";
            }
            
            if(!isset($this->dados["inputSerie"]) or $this->dados["inputSerie"] < 1 or $this->dados["inputSerie"] > 9)
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "Série Inválida<br>";
            }

            if(!isset($this->dados["inputEnd"]) or strlen($this->dados["inputEnd"]) > 100)
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "Endereço Inválido<br>";
            }
            
            if(!isset($this->dados["inputNum"]))
            {
                if($this->dados["inputNum"] < 1 or $this->dados["inputNum"] > 99999)
                {
                    $this->req["status"] += 1;
                    $this->req["msg"] .= "Número Inválido<br>";
                }
            }
            
            if(strlen($this->dados["inputComp"]) > 50)
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "Complemento Grande Demais<br>";
            }

            if(!isset($this->dados["inputBairro"]) or strlen($this->dados["inputBairro"]) > 100)
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "Bairro Inválido<br>";
            }

            if(!isset($this->dados["inputCidade"]) or strlen($this->dados["inputCidade"]) > 100)
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "Cidade Inválida<br>";
            }
            if(strlen($this->dados["inputEst"]) < 2)
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "Estado Inválido<br>";
            }

            if(!isset($this->dados["inputNomeM"]) or strlen($this->dados["inputNomeM"]) > 100)
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "Nome da Mãe Inválido <br>";
            }

            if(!isset($this->dados["inputCPFM"]) or strlen($this->dados["inputCPFM"]) != 11)
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "CPF Inválido<br>";
            }
            
            if(isset($this->dados["inputDataPref"])) 
            {
                if ($this->dados["inputDataPref"] < 1 or $this->dados["inputDataPref"] > 28)
                {
                    $this->req["status"] += 1;
                    $this->req["msg"] .= "Data Preferencial Inválida<br>";
                }
            }     
            
            if(!isset($this->dados["id"]))
            {
                $this->req["status"] += 1;
                $this->req["msg"] .= "ID Inválida<br>";
            }

            if($this->req["status"] > 0)
            {
                $this->req["msg"] .= "<hr>";
            }
        }
        else
        {
            $this->req["status"] += 1;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table("alunos_migration")->where('id', $id)->delete();
    }
}
