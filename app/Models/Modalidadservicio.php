<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modalidadservicio
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Servicio[] $servicios
 * @property Suscripcione[] $suscripciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Modalidadservicio extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicios()
    {
        return $this->hasMany('App\Models\Servicio', 'modalidadservicio_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suscripciones()
    {
        return $this->hasMany('App\Models\Suscripcione', 'modalidadservicio_id', 'id');
    }
    

}
