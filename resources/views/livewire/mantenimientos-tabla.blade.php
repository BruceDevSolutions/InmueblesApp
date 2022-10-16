<div class="card">
    <div class="card-header w-100">
        <span class="h4">{{ !$historial ? 'Mantenimientos pendientes' : 'Historial de mantenimientos' }}<a wire:click="cambiar_historial" style="font-size: 1rem; cursor: pointer;" class="ml-2 pe-auto"> {{ $historial ? 'Ver pendientes' : 'Ver historial' }} </a></span>  
        @can('agregar_tareas')
            <a class="btn btn-primary mb-3 btn-sm float-right" href="{{route('mantenimientos.create')}}">Registrar tarea</a>
        @endcan
        <input wire:keydown="cleanPage" wire:model.debounce.500ms="search" class="form-control w-100" placeholder="Busca un registro de mantenimiento">
    </div>
    @if($this->mantenimientos->count())          
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Detalle</th>
                        <th>Presupuesto</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($this->mantenimientos as $mantenimiento)
                        <tr>
                            <td>{{$mantenimiento->id}}</td>
                            <td>{{$mantenimiento->titulo}}</td>
                            <td class="word-wrap">{{Str::limit($mantenimiento->detalle,100)}}</td>
                            <td>{{number_format($mantenimiento->presupuesto,2)}}bs.</td>
                            @if(!$historial)
                                @can('manipular_tareas')
                                    <td style="width: 170px;">
                                        <div class="d-sm-flex flex-row text-center">
                                            <a href="{{route('mantenimientos.aprobar', $mantenimiento->id)}}" class="btn btn-sm btn-success mr-2 w-100">Aprobar</a>                      
                                        </div>
                                    </td> 
                                @endcan
                            @endif
                            <td style="width: 170px;">
                                <div class="d-sm-flex flex-row text-center">
                                    <a href="{{route('mantenimientos.show', $mantenimiento->id)}}" class="btn btn-sm btn-secondary mr-2 w-100">Ver detalles</a>                      
                                </div>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$this->mantenimientos->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>Aún no hay tareas de mantenuimiento registradas en el edificio.</strong>
        </div>
    @endif
</div>