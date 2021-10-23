@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>HALLANDO LA SUMA</h1>
@stop

@section('content')

    <p>Panel Administrativo</p>

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
@stop