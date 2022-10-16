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

            <form action="{{ route('egresos.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data" >
                @csrf
                <div class="row mb-4"  >
                    {{-- Monto --}}
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="monto">Monto</label>
                            <input value="{{ old('monto') }}" type="number" id="monto" name="monto" class="form-control" placeholder="Ingresa el monto" />
                        </div>
                    </div>
                    {{-- tipo  --}}
                    <div class="col">
                        <div class="form-group">
                            <label for="tipo_egreso_id">Tipo de egreso</label>
                            <select class="form-control" id="tipo_egreso_id"  name="tipo_egreso_id">
                                <option value="">--Selecciona una opción--</option>
                                @foreach ($tipo_egreso as $tipo)
                                    <option {{ old('tipo_egreso_id') == $tipo->id ? 'selected' : '' }} value="{{ $tipo->id }}" >{{ $tipo->tipo }}</option>
                                @endforeach
                            </select>
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
                            <label for="ruta_comprobante">Adjunta comprobante</label>
                            <input type="file" class="form-control-file" name="ruta_comprobante" id="ruta_comprobante" accept="image/*">
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
