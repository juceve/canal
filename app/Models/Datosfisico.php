<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Datosfisico
 *
 * @property $id
 * @property $cliente_id
 * @property $contextura_id
 * @property $peso
 * @property $altura
 * @property $imc
 * @property $alergias
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Contextura $contextura
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Datosfisico extends Model
{
    
    static $rules = [
		'cliente_id' => 'required',
		'contextura_id' => 'required',
		'peso' => 'required',
		'altura' => 'required',
		'imc' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id','contextura_id','peso','altura','imc','alergias'];


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
    public function contextura()
    {
        return $this->hasOne('App\Models\Contextura', 'id', 'contextura_id');
    }
    

}
