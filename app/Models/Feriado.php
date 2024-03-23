<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feriado
 *
 * @property $id
 * @property $mesdia
 * @property $gestion
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Feriado extends Model
{
    
    static $rules = [
		'mesdia' => 'required',
		'gestion' => 'required',
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['mesdia','gestion','nombre'];



}
