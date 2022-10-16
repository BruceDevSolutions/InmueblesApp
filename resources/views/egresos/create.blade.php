@extends('adminlte::page')

@section('title', 'Registrar egreso')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Registrar egreso</h1>

    <p> <span class="font-weight-bold ">Fecha: </span> {{ now()->isoFormat('Y-M-D') }}</p>

</div>
@stop

@section('content')
    @livewire('registrar-egreso')
@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop