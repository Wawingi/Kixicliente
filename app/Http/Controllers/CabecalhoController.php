<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CabecalhoController extends Controller
{
    public function isCarregadoCabecalho(){
        $cabecalhos = DB::table('cabecalho')->select('created_at')->get();
        $estado=0;

        if(count($cabecalhos)>0){
            $data_registo = $cabecalhos[count($cabecalhos)-1]->created_at;
            $qtdCab = count($cabecalhos);

            if(date('Y-m-d',strtotime($data_registo)) == date('Y-m-d')){
                $estado=1;
            }
        }else{
            $qtdCab = 0;
        }                
        return view('cabecalho.cabecalhosComponente',compact('estado','qtdCab'));
    }
}
