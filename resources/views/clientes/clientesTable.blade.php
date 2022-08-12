@foreach($creditos as $cr)
    <tr @if($cr->PeEstado=='Liquidado')
            style="background:#baf7df" 
        @elseif($cr->PeEstado=='Vigente')
            style="background:#f7f5ba" 
        @endif 
        class="tabelaClicked clickable-row" style="text-align:center">
        @php 
            $nome = explode(":",$cr->Cliente);
        @endphp           
        <td>{{$loop->iteration}}</td> 
        <td>{{$nome[0]}}</td> 
        <td>{{$cr->PeCodigo}}</td> 
        <td>
            {{$nome[1]}}
        </td>                             
        <td>{{ date('d-m-Y',strtotime($cr->PeDesemFecha)) }}</td>
        <td>{{$cr->PeEstado}}</td>
        <td> <a target="_blank" href='{{ url("verRelatorio/".base64_encode($cr->PeCodigo)) }}' class="btn btn-success btn-rounded btn-sm float-right"><i class='fas fa-eye'></i> Ver Relatório </a></td>
    </tr>
@endforeach