@extends('adminlte::page')

@section('title', 'Facultades')

@section('content_header')
    
@stop

@section('content')    
    @livewire('admin.intranet.gestion-academica.facultades.facultades-index')
    
    <style>
        .jetstream-modal{
            z-index: 9999;
        }

    </style>
@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@stop

@section('js')    
    <script src="{{ mix('js/app.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @include('admin.alertas.alertas')   

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
@stop