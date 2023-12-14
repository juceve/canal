<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vntpago
 *
 * @property $id
 * @property $vntventa_id
 * @property $vnttipopago_id
 * @property $tipopago
 * @property $monto
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Vnttipopago $vnttipopago
 * @property Vntventa $vntventa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vntpago extends Model
{
    
    static $rules = [
		'vntventa_id' => 'required',
		'vnttipopago_id' => 'required',
		'monto' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['vntventa_id', 'fechahora','vnttipopago_id','tipopago','monto', 'user_id','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vnttipopago()
    {
        return $this->hasOne('App\Models\Vnttipopago', 'id', 'vnttipopago_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vntventa()
    {
        return $this->hasOne('App\Models\Vntventa', 'id', 'vntventa_id');
    }
    

}
