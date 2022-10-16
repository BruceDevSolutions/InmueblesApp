@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>¡Perfecto!</strong> {{session('success')}}  
        </div>
    @endif      
    @livewire('users-index') 

@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop