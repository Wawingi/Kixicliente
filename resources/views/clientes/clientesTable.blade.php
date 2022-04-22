@foreach($clientes as $cliente)
    <tr class="tabelaClicked clickable-row" style="text-align:center" title='Clique aqui para abrir actividade'>           
        <td>{{$loop->iteration}}</td> 
        <td>{{$cliente->loan_number}}</td> 
        <td>{{$cliente->nome}}</td>                             
        <td>{{ date('d-m-Y',strtotime($cliente->data_actualizacao)) }}</td>
    </tr>
@endforeach