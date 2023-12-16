<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id
 * @property $nombre
 * @property $precio
 * @property $cantdias
 * @property $descripcion
 * @property $tiposervicio_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Tiposervicio $tiposervicio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{

  static $rules = [
    'nombre' => 'required',
    'precio' => 'required',
    'cantdias' => 'required',
    'tiposervicio_id' => 'required',
    'status' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre', 'precio', 'cantdias', 'descripcion', 'tiposervicio_id', 'status'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function tiposervicio()
  {
    return $this->hasOne('App\Models\Tiposervicio', 'id', 'tiposervicio_id');
  }
  public function horarioservicio()
    {
        return $this->hasMany('App\Models\Horarioservicio', 'servicio_id', 'id');
    }

    public function suscripciones()
    {
        return $this->hasMany('App\Models\Suscripcione', 'servicio_id', 'id');
    }
}
