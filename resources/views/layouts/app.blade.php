@extends('layouts.masterPage')
@section('content')
    <div>
        @include('includes.header')
       
            @yield('content1')
       
        @include('includes.footer')
    </div>
@stop