<div class="card">
    @if($this->pagos->count())          
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Monto</th>
                        <th>Detalle</th>
                        <th class="text-nowrap">Pagado hasta</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($this->pagos as $pago)
                        <tr>
                            <td>{{$pago->id}}</td>
                            <td>{{number_format($pago->monto,2)}}bs.</td>
                            <td class="word-wrap">{{Str::limit($pago->detalle,100)}}</td>
                            <td class="text-nowrap">{{\Carbon\Carbon::parse($pago->inmueble[0]->pivot->pagado_hasta)->isoFormat('MMMM YYYY')}}</td>
                            <td class="text-nowrap">{{$pago->created_at}}</td>
                            <td style="width: 170px;">
                                <div class="d-sm-flex flex-row text-center">
                                    <a href="{{route('ingresos.show', $pago->pivot->ingreso_id)}}" class="btn btn-sm btn-secondary mr-2 w-100">Ver detalles</a>                      
                                </div>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$this->pagos->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>Este inmueble aún no registra pagos.</strong>
        </div>
    @endif
</div>