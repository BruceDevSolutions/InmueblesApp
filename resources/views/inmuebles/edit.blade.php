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

                    @if($errors->any())
                        <div class="alert alert-danger col-12">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                </div>
                    <form action="{{ route('inmuebles.update', $inmueble) }}" method="POST" autocomplete="off" enctype="multipart/form-data" >
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-6 p-0">
                                <div class="form-group">
                                    <label class="h4" for="user_id">Apoderado:</label>
                                    <select class="form-control" id="user_id" name="user_id">
                                        <option value="">--Selecciona una opción--</option>
                                        @foreach ($users as $user)
                                            <option {{ old('user_id', $inmueble->user_id) == $user->id ? 'selected' : '' }} value="{{ $user->id }}" >{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="h4" for="monto_expensa">Monto de expensas:</label>
                                <input value="{{ old('monto', $inmueble->monto_expensa) }}" type="number" id="monto_expensa" name="monto_expensa" class="form-control" placeholder="Ingresa el monto" />
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3 btn-sm float-right">
                        Actualizar información
                    </button>
                    </form>
                </div>
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