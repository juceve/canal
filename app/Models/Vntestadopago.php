<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vntestadopago
 *
 * @property $id
 * @property $nombre
 * @property $nombrecorto
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Vntventa[] $vntventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vntestadopago extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'nombrecorto' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','nombrecorto','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vntventas()
    {
        return $this->hasMany('App\Models\Vntventa', 'vntestadopago_id', 'id');
    }
    

}
