@extends('adminlte::page')

@section('title', 'Entidades')

@section('content_header')
    
@stop

@section('content')    
    @livewire('admin.intranet.gestion-academica.entidades.entidades-index')
    
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
    <script src="{{ mix('js/app.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @include('admin.alertas.alertas')   
@stop