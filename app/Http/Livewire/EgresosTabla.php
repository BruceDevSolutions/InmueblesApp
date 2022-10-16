<?php

namespace App\Http\Livewire;

use App\Models\Egreso;
use Livewire\Component;
use Livewire\WithPagination;

class EgresosTabla extends Component
{
    use WithPagination; 

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        return view('livewire.egresos-tabla');
    }

    public function getEgresosProperty()
    {
        return Egreso::where('created_at', 'LIKE', '%'.$this->search.'%')->orderBy('id','desc')->paginate(12);
    }

    public function cleanPage(){
        $this->resetPage();
    }
}
