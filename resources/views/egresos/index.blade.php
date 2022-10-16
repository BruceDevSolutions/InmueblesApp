@extends('adminlte::page')

@section('title', 'Egresos')

@section('content_header')
    <h1>Egresos</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>¡Perfecto!</strong> {{session('success')}}  
        </div>
    @endif      
    @livewire('egresos-tabla') 
@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop