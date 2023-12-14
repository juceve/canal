<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vntventa
 *
 * @property $id
 * @property $user_id
 * @property $fecha
 * @property $cliente
 * @property $cliente_id
 * @property $servicio_id
 * @property $importe
 * @property $observaciones
 * @property $vntestadopago_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Servicio $servicio
 * @property User $user
 * @property Vntdetalleventa[] $vntdetalleventas
 * @property Vntestadopago $vntestadopago
 * @property Vntpago[] $vntpagos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vntventa extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'fecha' => 'required',
		'importe' => 'required',
		'vntestadopago_id' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','fecha','cliente','cliente_id','importe','observaciones','vntestadopago_id','status'];


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
       
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vntdetalleventas()
    {
        return $this->hasMany('App\Models\Vntdetalleventa', 'vntventa_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vntestadopago()
    {
        return $this->hasOne('App\Models\Vntestadopago', 'id', 'vntestadopago_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vntpagos()
    {
        return $this->hasMany('App\Models\Vntpago', 'vntventa_id', 'id');
    }
    

}
