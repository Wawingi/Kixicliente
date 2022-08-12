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
                            <li class="breadcrumb-item active">Clientes</li>
                            <li class="breadcrumb-item active">Consultar Cliente</li>
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

        @include('includes.modalPesquisa')
        <div>
            <br/>
            <div class="card-box">
                <div class="row">
                    <div style="text-align:center;" class="col-lg-12">
                        <button type="button" class="btn btn-rounded btn-sm btn-warning waves-effect waves-light" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#exampleModalScrollable"><i class="mdi mdi-plus-circle mr-1"></i>Informar Dados da Pesquisa</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <table id="paginationClientes" class="table table-sm table-bordeless" cellspacing="0" width="100%">
                            <thead id="cabecatabela">
                                <tr style="text-align:center">
                                    <th>#</th>
                                    <th>Loan Number</th>
                                    <th>Código de Crédito</th>
                                    <th>Nome</th>                               
                                    <th>Data de Desembolso</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tableClientes">                          
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div> 
</div>
<script>
    $('#formularioSalvar').submit(function(e){
        e.preventDefault();
        var request = new FormData(this);
        var tipo = request.get('tipo');
        var bi = request.get('bilhete');
        var nome = request.get('nome');
        var telefone = request.get('telefone');
        var loan = request.get('loan');

        if(!bi && !nome && !telefone && !loan){
            Swal.fire({
                text: "Informe pelo menos um valor para realizar a pesquisa.",
                icon: 'error',
                confirmButtonText: 'Fechar'
            }),
            exit;
        }

        if(bi.length<7 && tipo==1){
            Swal.fire({
                text: "O valor mínimo do bilhete deve ser de 7 caractéres.",
                icon: 'error',
                confirmButtonText: 'Fechar'
            }),
            exit;
        }

        if(nome.length<3 && tipo==2){
            Swal.fire({
                text: "O valor mínimo do nome deve ser de 3 caractéres.",
                icon: 'error',
                confirmButtonText: 'Fechar'
            }),
            exit;
        }

        if(tipo==2){
            var regex = /^[a-zA-ZáÁàÀçÇéÉèÈíÍìÌõÕóÓãÃúÚ\s]+$/;                
			if(regex.test(nome) === false) {
                Swal.fire({
                    text: "Informe um nome.",
                    icon: 'error',
                    confirmButtonText: 'Fechar'
                }),
                exit;
            }
        }

        if(telefone.length<5 && tipo==3){
            Swal.fire({
                text: "O valor mínimo para o campo telefone deve ser de 5 dígitos.",
                icon: 'error',
                confirmButtonText: 'Fechar'
            }),
            exit;
        }
        
        if(loan.length<4 && tipo==4){
            Swal.fire({
                text: "O valor mínimo para o loan number deve ser de 4 caractéres.",
                icon: 'error',
                confirmButtonText: 'Fechar'
            }),
            exit;
        }

        $.ajax({
            url:"{{ url('pesquisarCliente') }}",
            type: "POST",
            data: request,
            contentType: false,
            cache: false,
            processData: false,
            success:function(data){
                if(data==1){
                    Swal.fire({
                        text: "Nenhum dado encontrado. Verifique o dado de entrada e tente novamente.",
                        icon: 'error',
                        confirmButtonText: 'Fechar'
                    })
                    exit;
                }
                if(data==2){
                    Swal.fire({
                        text: "Informe um nome válido separado por espaço.",
                        icon: 'error',
                        confirmButtonText: 'Fechar'
                    })
                    exit;
                }

                $('#tableClientes').html(data);
                $('#paginationClientes').DataTable({
                        "pagingType": "full_numbers"
                });
                $('#modalClose').click();
                $('#validarForm')[0].reset();                          
            },
            error: function(e){
                /*$("#modalRejeitarClose").click();
                $('#formularioSalvar')[0].reset();
                Swal.fire({
                    text: 'Ocorreu um erro ao registar.',
                    icon: 'error',
                    confirmButtonText: 'Fechar'
                })*/
            }
        });
    });    
</script>
@stop