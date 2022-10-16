<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    const DEPARTAMENTO = 1;
    const LOCAL_COMERCIAL = 2;

    protected $guarded = ['id','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function piso()
    {
        return $this->belongsTo(Piso::class);
    }

    public function pagos()
    {
        return $this->belongsToMany(Ingreso::class)->withPivot('pagado_hasta', 'nombres')->orderByPivot('id', 'desc');
    }
}
