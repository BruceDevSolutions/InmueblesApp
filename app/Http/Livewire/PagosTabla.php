<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inmueble;
use Livewire\WithPagination;

class PagosTabla extends Component
{
    use WithPagination; 

    protected $paginationTheme = 'bootstrap';

    public $inmueble;

    public function getPagosProperty()
    {
        return $this->inmueble->pagos()->paginate(10);
    }
    public function render()
    {
        return view('livewire.pagos-tabla');
    }
}
