@extends('adminlte::page')

@section('title', 'Ingresos')

@section('content_header')
    <h1>Detalle de mantenimiento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header" style="background-color: #c9c9c5;">
            <h2 class="text-center font-weight-bold">Registro de mantenimiento #{{ $mantenimiento->id }} </h2>
        </div>
        <div class="card-body">
            @if(session('danger'))
                <div class="alert alert-danger" role="alert">
                    <strong>¡Alto!</strong> {{session('danger')}}  
                </div>
            @endif      
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Identificador:</h4> <p>{{ $mantenimiento->id }}</p>
                    </div>

                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Costo:</h4> <p>{{number_format($mantenimiento->presupuesto,2)}}bs.</p>
                    </div>

                    <div class="col-6">
                        <h4 class="font-weight-bold"> Título:</h4> <p>{{$mantenimiento->titulo}}</p>
                    </div>

                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Estado:</h4>
                        @if($mantenimiento->status)
                                <button class="btn btn-success">
                                    Realizado                                    
                                </button>
                            @else
                                <button class="btn btn-warning">
                                    Pendiente                                   
                                </button>
                        @endif
                    </div>

                    <div class="col-12">
                        <h4 class="font-weight-bold"> Detalle:</h4> <p>{{ $mantenimiento->detalle }} </p>
                    </div>

                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Fecha:</h4> <p>{{$mantenimiento->created_at}}</p>
                    </div>

                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Operador:</h4> <p>{{ $mantenimiento->user->name }} </p>
                    </div>


                    <div class="col-12">
                        <h4 class="font-weight-bold">Comprobante:</h4> 
                        @if($mantenimiento->imagen)
                            <img  class="w-100 mb-4" src="{{ Storage::url($mantenimiento->imagen) }}" alt="">
                            @else
                            <p>No se registró una imagen con esta solicitud de mantenimiento.</p>
                        @endif
                    </div>
                </div>

                @can('manipular_tareas')
                    <a class="btn btn-success float-right ml-2" href="{{ route('mantenimientos.aprobar', $mantenimiento ) }}">
                        Aprobar tarea
                    </a>
                
                <form action="{{route('mantenimientos.destroy', $mantenimiento)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger float-right">
                        Anular registro
                    </button>
                </form>
                @endcan

            </div> 
        </div>
    </div>
@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop