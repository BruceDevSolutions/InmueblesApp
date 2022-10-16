<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inmueble;
use Livewire\WithPagination;


class InmueblesTabla extends Component
{
    use WithPagination; 

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function getInmueblesProperty()
    {
        return Inmueble::where('identificador','LIKE','%'.$this->search.'%')->paginate(4);
    }

    public function render()
    {
        return view('livewire.inmuebles-tabla');
    }

    public function cleanPage(){
        $this->resetPage();
    }
}
