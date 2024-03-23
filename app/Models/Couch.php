<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Couch
 *
 * @property $id
 * @property $nombre
 * @property $cedula
 * @property $telefono
 * @property $email
 * @property $direccion
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Horarioservicio[] $horarioservicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Couch extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','cedula','telefono','email','direccion','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarioservicios()
    {
        return $this->hasMany('App\Models\Horarioservicio', 'couch_id', 'id');
    }
    

}
