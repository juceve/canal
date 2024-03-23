<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Horarioservicio
 *
 * @property $id
 * @property $servicio_id
 * @property $hora
 * @property $created_at
 * @property $updated_at
 *
 * @property Servicio $servicio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Horarioservicio extends Model
{

    static $rules = [
        'servicio_id' => 'required',
        'hora' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['servicio_id', 'hora', 'couch_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function servicio()
    {
        return $this->hasOne('App\Models\Servicio', 'id', 'servicio_id');
    }

    public function couch()
    {
        return $this->hasOne('App\Models\Couch', 'id', 'couch_id');
    }

    public function suscripciones()
    {
        return $this->hasMany('App\Models\Suscripcione', 'horarioservcio_id', 'id');
    }
}
