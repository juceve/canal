<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movimiento
 *
 * @property $id
 * @property $fecha
 * @property $glosa
 * @property $model_id
 * @property $model_type
 * @property $cuenta_id
 * @property $importe
 * @property $user_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Cuenta $cuenta
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Movimiento extends Model
{

    static $rules = [
        'fecha' => 'required',
        'glosa' => 'required',
        'importe' => 'required',
        'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha', 'glosa', 'model_id', 'model_type', 'cuenta_id', 'importe', 'user_id', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cuenta()
    {
        return $this->hasOne('App\Models\Cuenta', 'id', 'cuenta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
