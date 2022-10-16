@extends('adminlte::page')

@section('title', 'Registrar tarea de mantenimiento')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Registrar tarea de mantenimiento</h1>

    <p> <span class="font-weight-bold ">Fecha: </span> {{ now()->isoFormat('Y-M-D') }}</p>

</div>
@stop

@section('content')
<div>
    <div class="card">
        <div class="card-header" style="background-color: #c9c9c5;">
            <h2 class="text-center font-weight-bold">Formulario de registro</h2>
        </div>
        <div class="card-body">
            {{-- Mensajes de validación --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                         {{ $error }} <br>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('mantenimientos.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data" >
                @csrf
                <div class="row mb-4"  >
                    {{-- titulo --}}
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="titulo">Titulo</label>
                            <input value="{{ old('titulo') }}" type="text" id="titulo" name="titulo" class="form-control" placeholder="Ingresa el título" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="presupuesto">Presupuesto</label>
                            <input wire:model="presupuesto" value="{{ old('presupuesto') }}" type="number" id="presupuesto" name="presupuesto" class="form-control" placeholder="Ingresa el monto" />
                        </div>
                    </div>
                </div>

                {{-- Detalles --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="detalle">Detalles</label>
                    <textarea class="form-control" id="detalle" name="detalle" rows="4">{{ old('detalle') }}</textarea>
                </div>

                <div class="row mb-4">
                    {{-- Ruta --}}
                    <div class="col">
                        <div class="form-group">
                            <label for="imagen">Adjunta imagen</label>
                            <input type="file" class="form-control-file" name="imagen" id="imagen" accept="image/*">
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary">
                    Registrar egreso
                </button>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop