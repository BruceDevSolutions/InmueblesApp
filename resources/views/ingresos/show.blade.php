@extends('adminlte::page')

@section('title', 'Ingresos')

@section('content_header')
    <h1>Detalle de ingreso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header" style="background-color: #c9c9c5;">
            <h2 class="text-center font-weight-bold">Ingreso #{{ $ingreso->id }} ({{ $ingreso->tipo_ingreso->tipo }})</h2>
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
                        <h4 class="font-weight-bold"> Identificador:</h4> <p>{{ $ingreso->id }}</p>
                    </div>

                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Monto:</h4> <p>{{number_format($ingreso->monto,2)}}bs.</p>
                    </div>

                    <div class="col-12">
                        <h4 class="font-weight-bold"> Detalle:</h4> <p>{{ $ingreso->detalle }} </p>
                    </div>

                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Fecha:</h4> <p>{{$ingreso->created_at}}</p>
                    </div>

                    <div class="col-md-6">
                        <h4 class="font-weight-bold"> Operador:</h4> <p>{{ $ingreso->user->name }} </p>
                    </div>

                    @if($ingreso->tipo_ingreso_id == 1)
                        <div class="col-md-6">
                            <h4 class="font-weight-bold"> Inmueble:</h4> <p>{{$ingreso->inmueble[0]->identificador}}</p>
                        </div>

                        <div class="col-md-6">
                            <h4 class="font-weight-bold">Pagado por:</h4> <p>{{ $ingreso->inmueble[0]->pivot->nombres }} </p>
                        </div>

                        <div class="col-md-6">
                            <h4 class="font-weight-bold"> Válido hasta: </h4> 
                            <p>
                                {{ \Carbon\Carbon::parse($ingreso->inmueble[0]->pivot->pagado_hasta)->isoFormat('MMMM YYYY') }}
                            </p>
                        </div>
                        
                    @endif
                    <div class="col-12">
                        <h4 class="font-weight-bold">Comprobante:</h4> 
                        @if($ingreso->ruta_comprobante)
                            <img  class="w-100 mb-4" src="{{ Storage::url($ingreso->ruta_comprobante) }}" alt="">
                            @else
                            <p>No se registró comprobante con este ingreso.</p>
                        @endif
                    </div>
                </div>
                
                @can('manipular_ingresos')
                <form action="{{route('ingresos.destroy', $ingreso)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger float-right">
                        Anular ingreso
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