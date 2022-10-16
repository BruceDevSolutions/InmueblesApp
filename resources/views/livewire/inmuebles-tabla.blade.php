<div class="card">
    <div class="card-header">
        {{-- <a class="btn btn-primary mb-3 btn-sm float-right" href="{{route('inmuebles.create')}}">Registrar inmueble</a> --}}
        <input wire:keydown="cleanPage" wire:model.debounce.500ms="search" class="form-control w-100" placeholder="Busca un inmueble">
    </div>
    @if($this->inmuebles->count())          
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Apoderado</th>
                        <th>Monto expensas</th>
                        <th>Piso</th>
                        <th>Tipo inmueble</th>
                        <th>Debe</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($this->inmuebles as $inmueble)
                        <tr>
                            <td>{{$inmueble->identificador}}</td>
                            <td>{{$inmueble->user ? $inmueble->user->name : ''}}</td>
                            <td >{{$inmueble->monto_expensa}}bs.</td>
                            <td >{{$inmueble->piso->piso}}</td>
                            <td >{{$inmueble->tipo_inmueble == 1 ? 'Vivienda' : 'Local comercial'}}</td>
                            <td>
                               @if($inmueble->pagos->count())
                                    @php
                                        $meses = \Carbon\Carbon::parse($inmueble->pagos->first()->pivot->pagado_hasta)->diffInMonths(now());
                                    @endphp
                                    @if($meses < 1)
                                        <p class="text-success font-weight-bold ">
                                            No debe
                                        </p>
                                        @elseif ($meses>1 && $meses<=4)
                                            <p class="text-warning font-weight-bold ">
                                                {{$meses.' meses.'  }}
                                            </p>
                                        @elseif ($meses>4)
                                            <p class="text-danger font-weight-bold ">
                                                {{$meses.' meses.'  }}
                                            </p>
                                    @endif  
                                @else
                                    --
                               @endif
                            </td>
                            <td style="width: 170px;">
                                <div class="d-sm-flex flex-row text-center">
                                    <a href="{{route('inmuebles.show', $inmueble)}}" class="btn btn-sm btn-secondary mr-2 w-100">Ver detalles</a>                      
                                </div>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$this->inmuebles->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay registros que coincidan con su búsqueda.</strong>
        </div>
    @endif
</div>
