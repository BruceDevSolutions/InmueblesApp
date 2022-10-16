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

            <form action="{{ route('ingresos.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data" >
                @csrf
                <div class="row mb-4"  >
                    {{-- Monto --}}
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="monto">Monto</label>
                            <input wire:model="monto" value="{{ old('monto') }}" type="number" id="monto" name="monto" class="form-control" placeholder="Ingresa el monto" />
                        </div>
                    </div>
                    {{-- tipo  --}}
                    <div class="col">
                        <div class="form-group">
                            <label for="tipo_ingreso_id">Tipo de ingreso</label>
                            <select wire:model="tipo_ingreso_id" class="form-control" id="tipo_ingreso_id"  name="tipo_ingreso_id">
                                <option value="">--Selecciona una opción--</option>
                                @foreach ($tipo_ingreso as $tipo)
                                    <option value="{{ $tipo->id }}" >{{ $tipo->tipo }}</option>
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
                    @if($tipo_ingreso_id == 1)
                        {{-- Inmueble al que pertenece el pago --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="inmueble_id">Pago por inmueble:</label>
                                <select wire:model="inmueble" class="form-control" id="inmueble_id"  name="inmueble_id">
                                    <option value="">--Selecciona una opción--</option>
                                    @foreach ($inmuebles as $inmueble)
                                        <option value="{{ $inmueble->id }}" >{{ $inmueble->identificador }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- Pagado hasta --}}
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="pagado_hasta">Pagado hasta:</label>
                                <input
                                    wire:model="pagado_hasta"
                                    value="{{ $pagado_hasta }}" 
                                    min="{{ $pagado_hasta }}" 
                                    type="month"
                                    id="pagado_hasta" 
                                    name="pagado_hasta" 
                                    class="form-control" 
                                />
                            </div>
                        </div>
                        {{-- Nombres --}}
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label class="form-label" for="nombres">Persona que realizó el pago:</label>
                                <input value="{{ old('nombres') }}" type="text" id="nombres" name="nombres" class="form-control" placeholder="Ingresa un nombre" />
                            </div>
                        </div>
                    @endif
                </div>

                <button class="btn btn-primary">
                    Registrar ingreso
                </button>
            </form>
        </div>
    </div>
</div>
