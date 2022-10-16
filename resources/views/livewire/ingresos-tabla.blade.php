<div class="card">
    <div class="card-header">
        @can('manipular_ingresos')
            <a class="btn btn-primary mb-3 btn-sm float-right" href="{{route('ingresos.create')}}">Registrar ingreso</a>
        @endcan
        <input wire:keydown="cleanPage" wire:model.debounce.500ms="search" class="form-control w-100" placeholder="Busca un registro por una fecha">
    </div>
    @if($this->ingresos->count())          
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Monto</th>
                        <th>Detalle</th>
                        <th>Fecha</th>
                        <th>Tipo ingreso</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($this->ingresos as $ingreso)
                        <tr>
                            <td>{{$ingreso->id}}</td>
                            <td>{{number_format($ingreso->monto,2)}}bs.</td>
                            <td class="word-wrap">{{Str::limit($ingreso->detalle,100)}}</td>
                            <td class="text-nowrap">{{$ingreso->created_at}}</td>
                            <td >{{$ingreso->tipo_ingreso->tipo}}</td>
                            <td style="width: 170px;">
                                <div class="d-sm-flex flex-row text-center">
                                    <a href="{{route('ingresos.show', $ingreso->id)}}" class="btn btn-sm btn-secondary mr-2 w-100">Ver detalles</a>                      
                                </div>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$this->ingresos->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>Aún no hay ingresos registrados en el edificio.</strong>
        </div>
    @endif
</div>

