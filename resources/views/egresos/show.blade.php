@extends('adminlte::page')

@section('title', 'Egresos')

@section('content_header')
    <h1>Detalle de egreso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header" style="background-color: #c9c9c5;">
            <h2 class="text-center font-weight-bold">Egreso #{{ $egreso->id }} ({{ $egreso->tipo_egreso->tipo }})</h2>
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
                        <h4 class="font-weight-bold"> Identificador:</h4> <p>{{ $egreso->id }}</p>
                    </div>

                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Monto:</h4> <p>{{number_format($egreso->monto,2)}}bs.</p>
                    </div>

                    <div class="col-12">
                        <h4 class="font-weight-bold"> Detalle:</h4> <p>{{ $egreso->detalle }} </p>
                    </div>

                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Fecha:</h4> <p>{{$egreso->created_at}}</p>
                    </div>

                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Operador:</h4> <p>{{ $egreso->user->name }} </p>
                    </div>

                    <div class="col-12">
                        <h4 class="font-weight-bold">Comprobante:</h4> 
                        @if($egreso->ruta_comprobante)
                            <img  class="w-100 mb-4" src="{{ Storage::url($egreso->ruta_comprobante) }}" alt="">
                            @else
                            <p>No se registró comprobante con este egreso.</p>
                        @endif
                    </div>
                </div>
                @can('manipular_egresos')
                    <form action="{{route('egresos.destroy', $egreso)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger float-right">
                            Anular egreso
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
    <script> console.log('Hi!'); </script>
@stop