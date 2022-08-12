<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class RelatorioController extends Controller
{
    //Construção do relatório PDF
    public function criarRelatorio($pecodigo){
        $pecodigo = base64_decode($pecodigo);

        $cabecalho = DB::table('cabecalho')
                    ->where('PeCodigo',strtoupper($pecodigo))
                    ->first();
        
        $logomarca = base64_encode(file_get_contents(public_path('/images/logomarca.jpg')));
        $gps = base64_encode(file_get_contents(public_path('/images/gps.jpg')));
        

        $pdf = PDF::loadView('relatorios.relatorioCredito',compact('logomarca','gps','cabecalho'));
        return $pdf->setPaper('a4')->stream('Relatorio_'.$pecodigo.'.pdf');
    }
}
