@extends('adminlte::page')

@section('title', 'Ingresos')

@section('content_header')
    <h1>Ingresos</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>¡Perfecto!</strong> {{session('success')}}  
        </div>
    @endif      
    @livewire('ingresos-tabla') 
@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop