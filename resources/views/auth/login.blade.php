@extends('layouts.masterPage')
@section('content')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div style="box-shadow:2px 2px 5px #1abc9c" class="card">
                    <div class="card-body p-4">
                        <form action="{{ url('logar') }}" method="post">
                            @csrf
                            <div class="text-center">
                                <h3><img height="55" src="{{url('images/logo.png')}}"></h3>
                                <hr>
                            </div>
                            <img id="logando" src="{{ url('images/loader.gif') }}"/>
                            <div class="form-group mb-3">
                                <label for="emailaddress">Username </label>
                                <input class="form-control" name="username" type="text" id="username" required autofocus placeholder="ex: wawi.anto">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Senha</label>
                                <input class="form-control" name="password" type="password" id="senha" required placeholder="Informe a senha">
                            </div>
                            <div style="color:red;text-align:center" id="errorLogar"></div>
                            <br>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-success btn-block" type="submit"> Log In   <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#formularioLogar').submit(function(e){
        e.preventDefault();
        var request = new FormData(this);
        $('#logando').show();
        $.ajax({
            url:"{{ url('logar') }}",
            method: "POST",
            data: request,
            contentType: false,
            cache: false,
            processData: false,
            success:function(data){
                $('#logando').hide();
                if(data == 1){
                    location.href="home";
                }else{
                    Swal.fire({
                        text: 'Ocorreu um erro ao efectuar login, verifique os dados.',
                        icon: 'error',
                        confirmButtonText: 'Fechar'
                    })
                }
            },
            error: function(e){
                $('#logando').hide();
            }
        });
    });
</script>
@endsection
