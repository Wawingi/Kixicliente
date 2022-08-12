<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class UploadController extends Controller
{
    public function validarTelefone($telefone){
        return (int) filter_var($telefone, FILTER_SANITIZE_NUMBER_INT);  
    }

    //Carregar CLientes
    public function carregarFicheiro(Request $request){
        if ($request->file('ficheiro')->isValid()) {
            $novoNome="CLI_".date('d-m-Y').".json";
            $request->file('ficheiro')->move(public_path('uploads/'),$novoNome);

            //Abrir ficheiro carregado para obter dados
            $json = File::get('uploads/'.$novoNome);
            $clientes = json_decode($json);

                //DB::table('cliente')->delete();            
                $contador=0;
                foreach ($clientes as $cliente) {
                    DB::table('cliente')->insert([ 
                        'CeGeneral' => $cliente->CeGeneral,       
                        'nome' => $cliente->Nome,          
                        'telefone1' => $this->validarTelefone($cliente->CeTelefono),
                        'telefone2' => $cliente->CeTelefono2,
                        'bilhete' => $cliente->BI,
                        'created_at' => date('Ymd H:i:s'),
                        'updated_at' => date('Ymd H:i:s')
                    ]);
                    $contador++;
                }
                return $contador;
            
        }else{
            return "Houve erro ao registar dados";
        }
    }

    //Carregar Cabeçalhos
    public function carregarFicheiroCabeca(Request $request){
        if ($request->file('ficheiro')->isValid()) {
            $novoNome="CAB_".date('d-m-Y').".json";
            $request->file('ficheiro')->move(public_path('uploads/'),$novoNome);

            //Abrir ficheiro carregado para obter dados
            $json = File::get('uploads/'.$novoNome);
            $cabecalhos = json_decode($json);
            
                $contador=0;
                foreach ($cabecalhos as $cabecalho) {
                    //dd($cabecalho);
                    DB::table('cabecalho')->insert([ 
                        'CiFecha' => $cabecalho->CiFecha,
                        'Oficina' => $cabecalho->Oficina,
                        'PeCodigo' => $cabecalho->PeCodigo,
                        'Producto' => $cabecalho->Producto,
                        'Tecnologia' => $cabecalho->Tecnologia,
                        'Cliente' => $cabecalho->Cliente,
                        'PeSolicitud' => $cabecalho->PeSolicitud,
                        'PeDesemFecha' => $cabecalho->PeDesemFecha,
                        'PeDesemMonto' => $cabecalho->PeDesemMonto,
                        'PeIntTipo' => $cabecalho->PeIntTipo,
                        'PeIntTasa' => $cabecalho->PeIntTasa,
                        'PeIntMonto' => $cabecalho->PeIntMonto,
                        'Sectorista' => $cabecalho->Sectorista,
                        'PePlaTipo' => $cabecalho->PePlaTipo,
                        'PePlaNumero' => $cabecalho->PePlaNumero,
                        'PeEstado' => $cabecalho->PeEstado,
                        'DataWO' => $cabecalho->DataWO,
                        'Responsable' => $cabecalho->Responsable,
                        'Miembro' => $cabecalho->Miembro,
                        'DlMonto' => $cabecalho->DlMonto,
                        'Destino' => $cabecalho->Destino,
                        'DlCiclo' => $cabecalho->DlCiclo,
                        'Dlmemint' => $cabecalho->Dlmemint,
                        'Identidad' => $cabecalho->Identidad,
                        'Homonimia' => $cabecalho->Homonimia,
                        'Pagos' => $cabecalho->Pagos,
                        'Ciclo' => $cabecalho->Ciclo,
                        'CeGenero' => $cabecalho->CeGenero,
                        'PremioColateral' => $cabecalho->PremioColateral,
                        'PPxTC' => $cabecalho->PPxTC,
                        'Observacao' => $cabecalho->Observacao,
                        'Vermelho' => $cabecalho->Vermelho,
                        'created_at' => date('Ymd H:i:s'),
                        'updated_at' => date('Ymd H:i:s')
                    ]);
                    $contador++;
                }
                return $contador;
            
        }else{
            return "Houve erro ao registar dados";
        }
    }
}
