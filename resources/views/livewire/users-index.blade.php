<div class="card">
    <div class="card-header">
        <a class="btn btn-primary mb-3 btn-sm float-right" href="{{route('usuarios.create')}}">Registrar usuario</a>
        <input wire:keydown="cleanPage" wire:model.debounce.500ms="search" class="form-control w-100" placeholder="Busca un usuario...">
    </div>
    @if($users->count())
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Tipo de usuario</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @switch($user)
                                    @case($user->user_type==1)
                                        Administrador
                                        @break
                                    @case($user->user_type==2)
                                        Propietario/apoderado
                                        @break
                                    @case($user->user_type==3)
                                       Empleado
                                        @break
                                @endswitch
                            </td>
                            <td style="width: 170px;">
                                <form action="{{ route('usuarios.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger">
                                        Eliminar usuario
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay registros que coincidan con su búsqueda.</strong>
        </div>
    @endif        
</div>
