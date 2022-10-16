<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    public function tipo_ingreso()
    {
        return $this->belongsTo(TipoIngreso::class, 'tipo_ingreso_id',);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inmueble()
    {
        return $this->belongsToMany(Inmueble::class)->withPivot('pagado_hasta', 'nombres');
    }
}

