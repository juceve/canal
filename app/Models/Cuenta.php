<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Cuenta
 *
 * @property $id
 * @property $nombre
 * @property $tipo
 * @property $created_at
 * @property $updated_at
 *
 * @property Movimiento[] $movimientos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cuenta extends Model
{

  static $rules = [
    'nombre' => 'required',
    'tipo' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre', 'tipo'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function movimientos()
  {
    return $this->hasMany('App\Models\Movimiento', 'cuenta_id', 'id');
  }

  public static function enumOptions()
  {
    $resultado = DB::select("SHOW COLUMNS FROM cuentas WHERE Field = 'tipo'");
    $aux = "";
    $enum = [];
    foreach ($resultado as $item) {
      $aux = $item->Type;
      $aux = str_replace("'", "", $aux);
      $aux = substr($aux, 5, -1);
      $aux = explode(",", $aux);
      foreach ($aux as $item) {
        $enum[$item] = $item;
      }
    }

    return $enum;
  }
}
