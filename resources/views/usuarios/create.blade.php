@extends('adminlte::page')

@section('title', 'Registrar usuario')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Registrar usuario</h1>
</div>
@stop

@section('content')
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

        <form action="{{ route('usuarios.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data" >
            @csrf
                {{-- Nombres--}}
                <div class="col mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="name">Nombres</label>
                        <input value="{{ old('name') }}" type="text" id="name" name="name" class="form-control" placeholder="Ingresa un nombre" />
                    </div>
                </div>

                {{-- email  --}}
                <div class="col mb-4">
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input value="{{ old('email') }}" type="email" id="email" name="email" class="form-control" placeholder="Ingresa un email" />
                    </div>
                </div>

                {{-- tipo de usuario --}}
                <div class="col mb-4">
                    <div class="form-group">
                        <label for="user_type">Tipo de usuario</label>
                        <select class="form-control" id="user_type" name="user_type">
                            <option value="">--Selecciona una opción--</option>
                            <option value="1">Administrador</option>
                            <option value="2">Propietario/Apoderado</option>
                            <option value="3">Trabajador</option>
                        </select>
                    </div>
                </div>

                {{-- contraseña  --}}
                <div class="col mb-4">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input  type="password" id="password" name="password" class="form-control" placeholder="Ingresa una contraseña" />
                    </div>
                </div>

                {{-- confirmar contraseña  --}}
                <div class="col mb-4">
                    <div class="form-group">
                        <label for="password_confirmation">Repetir contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirma la contraseña" />
                    </div>
                </div>

          

            <button class="btn btn-primary">
                Registrar usuario
            </button>
        </form>
    </div>
</div>
@stop

@section('css')
  {{--   <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop