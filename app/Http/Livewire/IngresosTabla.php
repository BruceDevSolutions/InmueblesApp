<?php

namespace App\Http\Livewire;

use App\Models\Ingreso;
use Livewire\Component;
use Livewire\WithPagination;

class IngresosTabla extends Component
{
    use WithPagination; 

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function getIngresosProperty()
    {
        return Ingreso::where('created_at', 'LIKE', '%'.$this->search.'%')->orderBy('id','desc')->paginate(12);
    }

    public function render()
    {
        return view('livewire.ingresos-tabla');
    }

    public function cleanPage(){
        $this->resetPage();
    }
}
