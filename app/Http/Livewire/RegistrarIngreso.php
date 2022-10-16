<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inmueble;
use App\Models\TipoIngreso;
use Illuminate\Support\Carbon;

class RegistrarIngreso extends Component
{
    public $tipo_ingreso_id;
    public $monto;
    public $inmueble;
    public $pagado_hasta;

    public function updatedInmueble($value)
    {
        $this->monto = Inmueble::find($value)->monto_expensa;
        if(Inmueble::find($value)->pagos->count()){
            $this->pagado_hasta = Carbon::parse(Inmueble::find($value)->pagos->first()->pivot->pagado_hasta)->addMonth()->isoFormat('YYYY-MM'); 
        }else{
            $this->pagado_hasta = '';
        }
    }

    public function render()
    {
        return view('livewire.registrar-ingreso', [
            'tipo_ingreso' => TipoIngreso::all(),
            'inmuebles' => Inmueble::select('id','identificador')->get(),
        ]);
    }

    public function mount() {
        if (old('tipo_ingreso_id')) {
	        $this->tipo_ingreso_id = old('tipo_ingreso_id');
        }

        if (old('monto')) {
	        $this->monto = old('monto');
        }

        if (old('pagado_hasta')) {
	        $this->pagado_hasta = old('pagado_hasta');
        }

        if (old('inmueble_id')) {
	        $this->inmueble = old('inmueble_id');
        }
    }
}
