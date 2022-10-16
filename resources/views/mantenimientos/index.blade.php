@extends('adminlte::page')

@section('title', 'Mantenimientos')

@section('content_header')
    <div class="d-flex align-items-center ">
        <h1>Mantenimientos</h1>
    </div>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>¡Perfecto!</strong> {{session('success')}}  
        </div>
    @endif      

    @livewire('mantenimientos-tabla')
    
@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop