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
                                    <th>Nome</th>                               
                                    <th>Data de Actualização</th>
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
    // Validação do formulário do docente
    $("#validarForm").validate({
		rules: {					
			loan: {
                minlength:4
			},
			nome: {
				minlength:3,
                pattern: /^[a-zA-ZáÁàÀçÇéÉèÈíÍìÌõÕóÓãÃúÚ\s]+$/
			},
			bilhete: {
				minlength:7
			},
            telefone: {
				minlength:5
			}
        },
		messages: {	
            loan: {
				minlength: "O valor mínimo deve ser 4 digitos"
			},				
			nome: {
                minlength: "O valor mínimo deve ser 7 digitos",
                pattern: "Informe um nome válido contendo apenas letras alfabéticas"
			},
			bilhete: {
                minlength: "O valor mínimo deve ser 7 digitos"
			},            
            telefone: {
				minlength: "O valor mínimo deve ser 5 digitos"
			}
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `invalid-feedback` class to the error element
			error.addClass( "invalid-feedback" );
			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.next( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
		},

        submitHandler: function(validarForm,e){  			
            e.preventDefault();
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN':'<?php echo csrf_token() ?>'
                },
                url:"{{ url('pesquisarCliente') }}",
                method: "POST",
                data: $("#validarForm").serialize(),
                success:function(data){
                    if(data==0){
                        Swal.fire({
                            text: "Preencha pelo menos um campo.",
                            icon: 'error',
                            confirmButtonText: 'Fechar'
                        }),
                        exit;
                    }
                    if(data==1){
                        Swal.fire({
                            text: "Nenhum dado ncontrado. Verificque o dado de entrada e tente novamente.",
                            icon: 'error',
                            confirmButtonText: 'Fechar'
                        }),
                        exit;
                    }
                    if(data==2){
                        Swal.fire({
                            text: "Informe um nome válido separado por espaço.",
                            icon: 'error',
                            confirmButtonText: 'Fechar'
                        }),
                        exit;
                    }

                    console.log("AQUI: "+data);

                    $('#tableClientes').html(data);
                    $('#paginationClientes').DataTable({
                        "pagingType": "full_numbers"
                    });
                    $('#modalClose').click();
                    $('#validarForm')[0].reset();          
                },
                error: function(response){
					
                }
            });
        }
    });
</script>
@stop