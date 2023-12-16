<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Suscripcione
 *
 * @property $id
 * @property $cliente_id
 * @property $servicio_id
 * @property $vntventa_id
 * @property $inicio
 * @property $final
 * @property $horarioservicio_id
 * @property $horario
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Horarioservicio $horarioservicio
 * @property Servicio $servicio
 * @property Vntventa $vntventa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Suscripcione extends Model
{
    
    static $rules = [
		'cliente_id' => 'required',
		'servicio_id' => 'required',
		'vntventa_id' => 'required',
		'inicio' => 'required',
		'final' => 'required',
		'horario' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id','servicio_id','vntventa_id','inicio','final','horarioservicio_id','horario','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function horarioservicio()
    {
        return $this->hasOne('App\Models\Horarioservicio', 'id', 'horarioservicio_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function servicio()
    {
        return $this->hasOne('App\Models\Servicio', 'id', 'servicio_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vntventa()
    {
        return $this->hasOne('App\Models\Vntventa', 'id', 'vntventa_id');
    }
    

}
