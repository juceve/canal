<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 *
 * @property $id
 * @property $fecha
 * @property $user_id
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property CompraProducto[] $compraProductos
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Compra extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','user_id','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compraProductos()
    {
        return $this->hasMany('App\Models\CompraProducto', 'compra_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
