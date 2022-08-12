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
                            <li class="breadcrumb-item active">Meu Perfil</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <br />
            <div class="row">
                <div class="col-12">
                    <div style="text-align:center" class="card-box">
                        <h4><i class="mdi mdi-account-badge-horizontal"></i> MEU PERFIL</h4>
                        <hr id="Linha">
                        <br /><br />
                        <div class="row">
                            <div class="col-5">
                                <img    
                                    style="border:solid #6c757d 1px"                       
                                    src="{{ url('images/fotos/'.Session::get('user')->foto) }}"
                                    alt="user-image"
                                    class="rounded-circle"
                                    width="180px"
                                    height="180px"
                                />
                            </div>
                            <div class="col-7">
                                <p><i class="mdi mdi-account-circle-outline"></i> {{Session::get('user')->name}}</p>
                                <p><i class="mdi mdi-shield-account"></i> {{Session::get('user')->username}}</p>
                                <p><i class="mdi mdi-email"></i> {{Session::get('user')->email}}</p>
                                <p><i class="mdi mdi-office-building"></i> {{Session::get('user')->departamento}}</p>
                            </div>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
        </div>

        
        
    </div> 
</div> 
@stop