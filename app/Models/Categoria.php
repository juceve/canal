<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categoria extends Model
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
  protected $fillable = ['nombre'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function productos()
  {
    return $this->hasMany('App\Models\Producto', 'categoria_id', 'id');
  }
  public function vwproductos()
  {
    return $this->hasMany('App\Models\Vw_producto', 'categoria_id', 'id');
  }
}
