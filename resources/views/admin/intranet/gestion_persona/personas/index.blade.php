@extends('adminlte::page')

@section('title', 'Personas')

@section('content_header')
    
@stop

@section('content')    
    @livewire('admin.intranet.gestion-persona.personas.personas-index')
    
    <style>
        .jetstream-modal{
            z-index: 9999;
        }

    </style>
@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop

@section('js')
    <script type="text/javascript">
        // Solo permite ingresar numeros.
        function soloNumeros(e){
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }
    </script>    
    <script src="{{ mix('js/app.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @include('admin.alertas.alertas')   
@stop