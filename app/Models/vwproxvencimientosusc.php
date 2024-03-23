<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vwproxvencimientosusc extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'servicio_id', 'modalidadservicio_id', 'vntventa_id', 'creditos', 'inicio', 'final', 'horarioservicio_id', 'horario', 'status'];

    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }


    public function horarioservicio()
    {
        return $this->hasOne('App\Models\Horarioservicio', 'id', 'horarioservicio_id');
    }

    public function servicio()
    {
        return $this->hasOne('App\Models\Servicio', 'id', 'servicio_id');
    }

    public function modalidadservicio()
    {
        return $this->hasOne('App\Models\Modalidadservicio', 'id', 'modalidadservicio_id');
    }

    public function vntventa()
    {
        return $this->hasOne('App\Models\Vntventa', 'id', 'vntventa_id');
    }
}
