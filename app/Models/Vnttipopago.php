<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vnttipopago
 *
 * @property $id
 * @property $nombre
 * @property $nombrecorto
 * @property $factor
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Vntpago[] $vntpagos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vnttipopago extends Model
{

  static $rules = [
    'nombre' => 'required',
    'nombrecorto' => 'required',
    'factor' => 'required',
    'status' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre', 'nombrecorto', 'icon', 'factor', 'status'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function vntpagos()
  {
    return $this->hasMany('App\Models\Vntpago', 'vnttipopago_id', 'id');
  }
}
