<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suscripcione extends Model
{    
    static $rules = [
		'cliente_id' => 'required',
		'servicio_id' => 'required',
		'vntventa_id' => 'required',
		'horario' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['cliente_id','servicio_id', 'modalidadservicio_id','vntventa_id', 'creditos','inicio','final','horarioservicio_id','horario','status'];

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
