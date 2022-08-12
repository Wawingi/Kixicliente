<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//Use Exception;

class ClienteController extends Controller
{
    public function pesquisarCliente(Request $request){  
        //Pesquisa por Bilhete
        if(!is_null($request->bilhete)){
            $clientes = DB::table('cliente')
                        ->where('bilhete', 'like',$request->bilhete.'%')
                        ->paginate(30);
        }

        //Pesquisa por Nome
        if(!is_null($request->nome)){
            //Verificar se é nome separado de espaço
            if(strpos($request->nome, ' ') > 0){
                $nomes = explode(' ',$request->nome);
                $nome1 = $nomes[0];   
                $nome2 = $nomes[count($nomes)-1]; 
                
                $clientes = DB::table('cliente')
                        ->where('nome', 'like','%'.$nome1.'%')
                        ->orwhere('nome', 'like','%'.$nome2.'%')
                        ->paginate(30);
            } else {
                return 2;
            }
        }
      
        //Pesquisa por telefone
        if(!is_null($request->telefone)){
            $clientes = DB::table('cliente')
                        ->where('telefone1', 'like','%'.$request->telefone.'%')
                        ->orwhere('telefone2', 'like','%'.$request->telefone.'%')
                        ->paginate(30);
        }

        //Pesquisa por Loan Number
        if(!is_null($request->loan)){
            $clientes = DB::table('cliente')
                        ->where('CeGeneral', 'like',strtoupper($request->loan).'%')
                        ->paginate(30);
        }	
       
        //Nenhum dado encontrado
        if(count($clientes)<1){
            return 1;
        }

        $creditos = array();
        foreach($clientes as $cliente){
            $credito = DB::table('cabecalho')
                        ->select('PeCodigo','Cliente','created_at','PeDesemFecha','PeEstado')
                        ->where('Cliente', 'like',$cliente->CeGeneral.'%')
                        ->get();

            if(count($credito)>=1){
                foreach($credito as $cr){
                    array_push($creditos,$cr); 
                }
            }            
        }

        return view('clientes.clientesTable',compact('creditos'));
    }

    //API para armazenar clientes vindo da consolidado 
    public function registarClientesAPI(Request $request){
        try{
            if(DB::table('cliente')->insert([ 
                'codigo_credito' => $request->codigo_credito,
                'codigo_membro' => $request->codigo_membro, 
                'data_actualizacao' => $request->data_actualizacao,         
                'loan_number' => $request->loan_number,            
                'nome' => $request->nome,          
                'telefone1' => $request->telefone1,
                'telefone2' => $request->telefone2,
                'bilhete' => $request->bilhete,
                'created_at' => date('Ymd H:i:s'),
                'updated_at' => date('Ymd H:i:s')
            ])){
                return response()->json(1);
            }else{
                return response()->json(0);
            }
        } catch (Exception $e){
            return response()->json(0);
        }
    } 


    public function isCarregadoClientes(){
        $clientes = DB::table('cliente')->select('created_at')->get();
        $estado=0;

        if(count($clientes)>0){
            $data_registo = $clientes[count($clientes)-1]->created_at;
            $qtdCli = count($clientes);

            if(date('Y-m-d',strtotime($data_registo)) == date('Y-m-d')){
                $estado=1;
            }  
        }else{
            $qtdCli = 0;
        }     
        return view('clientes.clientesComponente',compact('estado','qtdCli'));
    }
}
