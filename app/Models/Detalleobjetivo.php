<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detalleobjetivo
 *
 * @property $id
 * @property $cliente_id
 * @property $objetivo_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Objetivo $objetivo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Detalleobjetivo extends Model
{
    
    static $rules = [
		'cliente_id' => 'required',
		'objetivo_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id','objetivo_id'];


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
    public function objetivo()
    {
        return $this->hasOne('App\Models\Objetivo', 'id', 'objetivo_id');
    }
    

}
