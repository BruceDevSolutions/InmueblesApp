<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    public function tipo_egreso()
    {   
        return $this->belongsTo(TipoEgreso::class, 'tipo_egreso_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
