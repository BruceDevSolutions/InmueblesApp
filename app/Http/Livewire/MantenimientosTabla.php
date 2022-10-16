<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mantenimiento;
use Livewire\WithPagination;

class MantenimientosTabla extends Component
{
    public $historial = false;
    public $search;

    use WithPagination; 

    protected $paginationTheme = 'bootstrap';

    public function cambiar_historial()
    {
        $this->historial = !$this->historial;
    }


    public function getMantenimientosProperty()
    {
        if($this->historial){
            return Mantenimiento::where('status', true)->where(function($query){
                return $query->where('titulo', 'LIKE', '%'.$this->search.'%')->orWhere('detalle', 'LIKE', '%'.$this->search.'%');
            })->orderBy('id','desc')->paginate(2);
        }else{
            return Mantenimiento::where('status', false)->where(function($query){
                return $query->where('titulo', 'LIKE', '%'.$this->search.'%')->orWhere('detalle', 'LIKE', '%'.$this->search.'%');
            })->orderBy('id','desc')->paginate(2);
        }
    }

    public function render()
    {
        return view('livewire.mantenimientos-tabla');
    }

    public function cleanPage(){
        $this->resetPage();
    }
}
