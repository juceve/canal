<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vntdetalleventa
 *
 * @property $id
 * @property $vntventa_id
 * @property $detalle
 * @property $cantidad
 * @property $preciounitario
 * @property $subtotal
 * @property $created_at
 * @property $updated_at
 *
 * @property Vntventa $vntventa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vntdetalleventa extends Model
{

    static $rules = [
        'detalle' => 'required',
        'cantidad' => 'required',
        'preciounitario' => 'required',
        'subtotal' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['vntventa_id', 'servicio_id', 'producto_id', 'detalle', 'cantidad', 'preciounitario', 'subtotal'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vntventa()
    {
        return $this->hasOne('App\Models\Vntventa', 'id', 'vntventa_id');
    }
    public function servicio()
    {
        return $this->hasOne('App\Models\Servicio', 'id', 'servicio_id');
    }
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'producto_id');
    }
}
