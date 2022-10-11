<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Relatório</title>
        
	</head>
    <style>
        .tabela-relatorio{
            border-collapse:collapse;
            border:solid #111 1px;
        }
      
        .tabela-relatorio{
            border: 1px solid #d1cece;
        }

        .tabela-relatorio > tr{
            border: 1px solid #d1cece;
        }

        .tabela-relatorio > tr > td{
            border: 1px solid #d1cece;
        }
        *{
            font-family: sans-serif;
            font-size:10px;
        }
        hr{
            border-top: 1px dotted #8c8b8b
        }
        .corAzulE{
            color:#042354;
        }
        .corAzulC{
            color:#0e869e;
        }
        .corVerdeE{
            color:#034514;
        }
        .fundoAzulC{
            background:#d6f8ff;
        }
        .fundoAmareloC{
            background:#f3f768;
        }
    </style>
    <body>      
        <!-- Inicio da Content -->
        <div style="display: inline">
            <img src="data:image/png;base64,{{$logomarca}}" width="130" height="60">
                                
            <table width="65%" style="margin-left:140px;margin-top:-40px;position:relative" class="table tabela-relatorio">
                <tbody>
                    <tr style="font-size:10px;border:1px solid #111">
                        <td class="corAzulE" style="border:1px solid #111"><div style="margin:8px 0px 8px 5px;font-weight:bold">LOAN INDIVIDUAL: {{$cabecalho->PeCodigo}}</div></td>
                        <td class="corAzulC"><div style="margin:8px 0px 8px 5px;font-weight:bold">{{mb_strtoupper($cabecalho->Cliente,mb_internal_encoding())}}</div></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <table width="85%" style="position:relative;margin-top:-3px" class="table tabela-relatorio">
                <tbody>
                    <tr style="font-size:10px;border:1px solid #111">
                        <td style="border:1px solid #111"><div style="margin:3px 0px 3px 5px"><b>Impresso por</b>: {{Session::get('user')->username}} [{{date('d-m-Y H:i:s')}}]</div></td>
                        <td class="corAzulC" style="border:1px solid #111"><div style="margin:3px 0px 3px 5px">Fecho de: {{date('d-m-Y',strtotime("-1 days"))}}</div></td>
                        <td style="border:1px solid #111"><div style="margin:3px 0px 3px 5px">{{$cabecalho->Oficina}}</div></td>
                        <td style="border:1px solid #111"><div style="margin:3px 0px 3px 5px">Página 1 de 2</div></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="fundoAzulC" style="text-align:center;border: solid 1px #0e869e;font-size:10px;margin-top:5px;width:50%">
            <div class="corAzulC" style="margin:5px 0px 5px 0px;font-weight:bold">Data da Consulta: {{date('d-m-Y')}}</div>
        </div>
        <div style="text-align:left;font-size:10px;margin-top:5px;width:50%">
            <hr>
                <p style="text-align:center"><img style="margin-bottom:-5px" src="data:image/png;base64,{{$gps}}" width="20" height="20"> Agência : <b>{{$cabecalho->Oficina}}</b></p>
            <hr>
                <p style="text-align:center">Produto: <b>{{$cabecalho->Producto}}</b></p>
            <hr>
                <div style="text-align:left;display:inline-block">
                    <p style="margin:15px 0px 0px 0px">Solicitação : <b>{{date('d-m-Y',strtotime($cabecalho->PeSolicitud))}}</b></p>
                    <p>Desembolso  : <b>{{date('d-m-Y',strtotime($cabecalho->PeDesemFecha))}}</b></p>
                    <p>Montante    : <b class="fundoAmareloC">{{number_format($cabecalho->PeDesemMonto,2)}}</b></p>
                </div>
                <div style="text-align:left;margin-left:100px;display:inline-block">
                    <p>Tipo de Juro : <b>{{$cabecalho->PeIntTipo}}</b></p>
                    <p>Taxa de Juro  : <b>{{$cabecalho->PeIntTasa}}% anual</b></p>
                    <p>Juros    : <b>{{number_format($cabecalho->PeIntMonto,2)}}</b></p>
                </div>
            <hr style="margin-top:-20px">
        </div>
        <p style="margin-top:-10px;font-size:10px">Estado do Credito: <b>{{$cabecalho->PeEstado}}</b></p>
        
        <table width="100%" style="position:relative;margin-top:-3px;font-size:10px">
            <tbody>
                <tr style="text-align:center;background:#d9ddde">
                    <td colspan="2">
                        <div style="margin:3px 0px 3px 5px">Tipo de Plano de Pagamento: 
                            @if($cabecalho->PePlaTipo=='B')
                                <b>Bi-Semanal</b>
                            @elseif($cabecalho->PePlaTipo=='F')
                                <b>Quadrimestral</b>
                            @elseif($cabecalho->PePlaTipo=='I')
                                <b>Quinquemestral</b>
                            @elseif($cabecalho->PePlaTipo=='M')
                                <b>Mensal</b>
                            @elseif($cabecalho->PePlaTipo=='O')
                                <b>Outro</b>
                            @elseif($cabecalho->PePlaTipo=='Q')
                                <b>Trimestral</b>
                            @elseif($cabecalho->PePlaTipo=='T')
                                <b>Bi-Mensal</b>
                            @elseif($cabecalho->PePlaTipo=='W')
                                <b>Semanal</b>
                            @endif
                        </div>
                    </td>
                    <td colspan="2"><div style="margin:3px 0px 3px 5px">Numero de Prestações: <b>{{$cabecalho->PePlaNumero}}</b></div></td>
                    <td colspan="2"><div style="margin:3px 0px 3px 5px">Ciclo: <b>{{$cabecalho->Ciclo}}</b></div></td>
                    <td colspan="2"><div style="margin:3px 0px 3px 5px">Dias Em Atraso: <b></b></div></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center">Oficial de Crédito: <b>{{$cabecalho->Sectorista}}</b></td>
                    <td colspan="5" style="text-align:center">Responsavel pela inserção de dados: <b>{{$cabecalho->Responsable}}</b></td>
                </tr>
                <tr class="fundoAzulC corVerdeE" style="text-align:center">
                    <td style="border:solid 1px #0e869e" colspan="8"><div style="margin:3px 0px 3px 0px"><b>DADOS DE DESEMBOLSO POR CLIENTE</b></div></td>
                </tr>
                <tr style="font-weight:bold">
                    <td width="2%"><div style="margin:3px 0px 3px 5px">#</div></td>
                    <td width="30%"><div style="margin:3px 0px 3px 5px">Membro</div></td>
                    <td><div style="margin:3px 0px 3px 5px">Gênero</div></td>
                    <td><div style="margin:3px 0px 3px 5px">Identidade</div></td>
                    <td><div style="margin:3px 0px 3px 5px">Ciclo</div></td>
                    <td><div style="margin:3px 0px 3px 5px">Desembolso</div></td>
                    <td><div style="margin:3px 0px 3px 5px">Colateral</div></td>
                    <td><div style="margin:3px 0px 3px 5px">Observação</div></td>
                </tr>
                <tr>
                    <td width="2%"><div style="margin:3px 0px 3px 5px">1</div></td>
                    <td width="30%"><div style="margin:3px 0px 3px 5px">{{$cabecalho->Cliente}}</div></td>
                    <td><div style="margin:3px 0px 3px 5px">{{$cabecalho->CeGenero}}</div></td>
                    <td><div style="margin:3px 0px 3px 5px">{{$cabecalho->Identidad}}</div></td>
                    <td><div style="margin:3px 0px 3px 5px">{{$cabecalho->Ciclo}}</div></td>
                    <td><div style="margin:3px 0px 3px 5px">{{number_format($cabecalho->PeDesemMonto,2)}}</div></td>
                    <td><div style="margin:3px 0px 3px 5px"></div></td>
                    <td><div style="margin:3px 0px 3px 5px"></div></td>
                </tr>
            </tbody>
        </table>
        <!-- Fim da Content -->
    </body>
</html>