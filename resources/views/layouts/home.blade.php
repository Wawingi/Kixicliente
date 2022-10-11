@extends('layouts.app')
@section('content1')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">KixiClientes</a></li>
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?php $n='AC/I/K0852'; ?>
        <a href='{{url("xxx/4/{$n}")}}' class="btn btn-success btn-rounded btn-sm float-right"><i class='fas fa-eye'></i> Ver Relatório </a></td>       
        
    </div> 
</div> 
@stop