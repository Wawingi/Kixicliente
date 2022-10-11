<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function pegaCreditosAPI($tipo,$num_documento){
        //Pesquisa por Bilhete -------- Tipo: 1
        if($tipo==1){
            $clientes = DB::table('cliente')
                        ->where('bilhete', 'like',strtoupper($num_documento).'%')
                        ->paginate(20);
        }

        //Pesquisa por Nome ---------- Tipo: 2
        if($tipo==2){
            //Verificar se é nome separado de espaço
            if(strpos($num_documento, ' ') > 0){
                $nomes = explode(' ',$num_documento);
                $nome1 = $nomes[0];   
                $nome2 = $nomes[count($nomes)-1]; 
                
                $clientes = DB::table('cliente')
                        ->where('nome', 'like','%'.$nome1.'%')
                        ->orwhere('nome', 'like','%'.$nome2.'%')
                        ->paginate(20);
            } else {
                return 1;
            }
        }

        //Pesquisa por telefone -------- Tipo: 3
        if($tipo==3){
            $clientes = DB::table('cliente')
                        ->where('telefone1', 'like','%'.$num_documento.'%')
                        ->orwhere('telefone2', 'like','%'.$num_documento.'%')
                        ->paginate(20);
        }

        //Pesquisa por Loan Number -------- Tipo: 4
        if($tipo==4){
            $clientes = DB::table('cliente')
                        ->where('CeGeneral', 'like',strtoupper($num_documento).'%')
                        ->paginate(20);
        }	

        //Nenhum dado encontrado
        if(count($clientes)<1){
            return response()->json('Nenhum registo encontrado.');
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

        return response()->json($creditos);
    }
}
