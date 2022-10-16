@extends('adminlte::page')

@section('title', 'Inmuebles')

@section('content_header')
    <h1>Inmuebles registrados en el edificio</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>¡Perfecto!</strong> {{session('success')}}  
        </div>
    @endif      
    @livewire('inmuebles-tabla') 
@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop