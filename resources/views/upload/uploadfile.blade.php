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
                            <li class="breadcrumb-item active">Configurações</li>
                            <li class="breadcrumb-item active">Importar Dados</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alerta de inserção sucesso -->
        @if(session('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong>
                    {{ session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!--<div id="loader" class="loader">Loading...</div>-->                          
        <div id="cover-spin"></div>

        <br>
        <div>
            <div class="row">
                <div class="col-6">
                    <div class="card-box">
                        <br>
                        <form id="carregarFicheiro" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row text-center">
                                <div class="col-12">  
                                    <img src="{{ url('images/clientes.jpg') }}" width="120px" height="120px" alt="user-image" class="rounded-circle">
                                </div>
                            </div> 
                            <br>
                            <div id="componenteCliente" class="progress mb-1 progress-xl">
                            </div>
                            <div class="row">
                                <div class="col-12">        
                                    <div class="form-group">
                                        <input required name="ficheiro" type="file" class="form-control form-control-sm" accept="application/json" placeholder="Escolha o ficheiro">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-search mr-1"></i>Submeter</button>
                            </div>
                        </form>    
                    </div>
                </div>

                <div class="col-6">
                    <div class="card-box">
                        <br>
                        <form id="carregarCabecalho" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row text-center">
                                <div class="col-12">  
                                    <img src="{{ url('images/cabecalho.jpg') }}" width="120px" height="120px" alt="user-image" class="rounded-circle">
                                </div>
                            </div> 
                            <br>
                            <div id="componenteCabecalho" class="progress mb-1 progress-xl">
                            </div>
                            <div class="row">
                                <div class="col-12">        
                                    <div class="form-group">
                                        <input required name="ficheiro" type="file" class="form-control form-control-sm" accept="application/json" placeholder="Escolha o ficheiro">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-search mr-1"></i>Submeter</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>        
    </div> 
</div>
<script> 
    function carregadoCliente(){
        $.ajax({
            url: "{{ url('isCarregadoClientes') }}",
            success:function(data){
                $('#componenteCliente').html(data);
            },
            error: function(e)
			{
				carregadoCliente();
			}
        })
    }
    carregadoCliente();

    function carregadoCabecalho(){
        $.ajax({
            url: "{{ url('isCarregadoCabecalho') }}",
            success:function(data){
                $('#componenteCabecalho').html(data);
            },
            error: function(e)
			{
				carregadoCliente();
			}
        })
    }
    carregadoCabecalho();

    //Inserir CLientes via JSON
    $('#carregarFicheiro').submit(function(e){
        $('#cover-spin').show();
		e.preventDefault();
        var request = new FormData(this);

        $.ajax({
            url: "{{ url('carregarFicheiro') }}",
            method: "POST",
            data: request,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                $('#cover-spin').hide();   
                location.reload();         
            },
            error: function(e)
            {
                $('#cover-spin').hide();
                Swal.fire({
                    text: "ERRO AO SALVAR OU DADOS JÁ EXISTEM",
                    icon: 'error',
                    confirmButtonText: 'Fechar'
                }); 
                document.getElementById("loader").style.display = "none";   
            }
        });      
    });     


    //Inserir Cabeçalhos via JSON
    $('#carregarCabecalho').submit(function(e){
        $('#cover-spin').show();
		e.preventDefault();
        var request = new FormData(this);

        $.ajax({
            url: "{{ url('carregarFicheiroCabeca') }}",
            method: "POST",
            data: request,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                $('#cover-spin').hide();   
                location.reload();         
            },
            error: function(e)
            {
                $('#cover-spin').hide();
                
                Swal.fire({
                    text: "ERRO AO SALVAR OU DADOS JÁ EXISTEM",
                    icon: 'error',
                    confirmButtonText: 'Fechar'
                }); 
                document.getElementById("loader").style.display = "none";
            }
        });      
    });  
</script>
@stop