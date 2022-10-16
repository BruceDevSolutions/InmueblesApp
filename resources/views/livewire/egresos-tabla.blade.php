<div class="card">
    <div class="card-header">
        @can('manipular_egresos')
            <a class="btn btn-primary mb-3 btn-sm float-right" href="{{route('egresos.create')}}">Registrar egreso</a>
        @endcan
        <input wire:keydown="cleanPage" wire:model.debounce.500ms="search" class="form-control w-100" placeholder="Busca un registro por una fecha">
    </div>
    @if($this->egresos->count())          
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Monto</th>
                        <th>Detalle</th>
                        <th>Fecha</th>
                        <th>Tipo egreso</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($this->egresos as $egreso)
                        <tr>
                            <td>{{$egreso->id}}</td>
                            <td>{{number_format($egreso->monto,2)}}bs.</td>
                            <td class="word-wrap">{{Str::limit($egreso->detalle, 100)}}</td>
                            <td class="text-nowrap">{{$egreso->created_at}}</td>
                            <td >{{ $egreso->tipo_egreso->tipo}}</td>
                            <td style="width: 170px;">
                                <div class="d-sm-flex flex-row text-center">
                                    <a href="{{route('egresos.show', $egreso->id)}}" class="btn btn-sm btn-secondary mr-2 w-100">Ver detalles</a>                      
                                </div>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$this->egresos->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>Aún no hay egresos registrados en el edificio.</strong>
        </div>
    @endif
</div>

