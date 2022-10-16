@extends('adminlte::page')

@section('title', 'Registrar ingreso')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Registrar ingreso</h1>

    <p> <span class="font-weight-bold ">Fecha: </span> {{ now()->isoFormat('Y-M-D') }}</p>

</div>
@stop

@section('content')
    @livewire('registrar-ingreso')
@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop