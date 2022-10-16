@extends('adminlte::page')

@section('title', 'Inmuebles')

@section('content_header')
    <h1>Detalle de inmueble</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Inmueble {{ $inmueble->identificador }}</h1>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <h4 class="font-weight-bold"> Piso:</h4> <p>{{ $inmueble->piso->piso }} </p>
                    </div>

                    <div class="col-6">
                        <h4 class="font-weight-bold"> Tipo de inmueble:</h4> <p>{{$inmueble->tipo_inmueble == 1 ? 'Vivienda' : 'Local comercial'}}</p>
                    </div>

                    <div class="col-6">
                        <h4 class="font-weight-bold"> Apoderado:</h4> <p>{{$inmueble->user ? $inmueble->user->name : ''}} </p>
                    </div>

                    <div class="col-6">
                        <h4 class="font-weight-bold"> Monto de expensas:</h4> <p>{{$inmueble->monto_expensa}}bs.</p>
                    </div>

                    <div class="col-6">
                        <h4 class="font-weight-bold"> Debe:</h4> <p>{{ $inmueble->pagos->count() ? \Carbon\Carbon::parse($inmueble->pagos->first()->pivot->pagado_hasta)->diffInMonths(now()).' meses.' : '--' }}</p>
                    </div>
                </div>

                @can('actualizar_inmuebles')
                    <a class="btn btn-primary mb-3 btn-sm float-right" href="{{route('inmuebles.edit', $inmueble)}}">Actualizar información</a>
                @endcan

            </div> 
        </div>
    </div>

    <h3>Historial de pagos</h3>

    @livewire('pagos-tabla', ['inmueble' => $inmueble]) 
    
@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop