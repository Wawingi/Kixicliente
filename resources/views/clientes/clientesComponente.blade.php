@if($estado==1)
    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuemin="0" aria-valuemax="100">
        <b>Carregados Hoje [{{$qtdCli}}]</b>
    </div>
@else
    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 100%" aria-valuemin="0" aria-valuemax="100">
        Não Carregado
    </div>
@endif