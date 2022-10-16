<?php

namespace App\Http\Livewire;

use App\Models\TipoEgreso;
use Livewire\Component;

class RegistrarEgreso extends Component
{
    public function render()
    {
        return view('livewire.registrar-egreso', [
            'tipo_egreso' => TipoEgreso::all(),
        ]);
    }
}
