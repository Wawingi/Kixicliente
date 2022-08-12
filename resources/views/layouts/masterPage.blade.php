<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>KixiClientes</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/estilo.css') }}" rel="stylesheet" type="text/css" />
       
        <link href="{{ asset('css/datatables2.min.css') }}" rel="stylesheet" type="text/css" />
       
        <link href="{{ asset('libs/custombox/custombox.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('libs/switchery/switchery.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/loader.css') }}" rel="stylesheet" type="text/css" />
		
        <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.js') }}"></script>
        <script src="{{ asset('js/additional-methods.js') }}"></script>
        <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
	</head>
    <body>      
        <!-- Inicio da Content -->
            @yield('content')
        <!-- Fim da Content -->

        <!-- Importação das SCRIPTS-->
        <script src="{{ asset('js/vendor.min.js') }}"></script>
        <script src="{{ asset('js/app.min.js') }}" difer></script>
		<script src="{{ asset('js/datatables2.min.js') }}"></script>
    </body>
</html>