<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CompraProducto
 *
 * @property $id
 * @property $producto_id
 * @property $compra_id
 * @property $cantidad
 * @property $precio
 * @property $created_at
 * @property $updated_at
 *
 * @property Compra $compra
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CompraProducto extends Model
{

    static $rules = [
        'producto_id' => 'required',
        'compra_id' => 'required',
        'cantidad' => 'required',
        'precio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['producto_id', 'compra_id', 'nombreproducto', 'cantidad', 'precio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function compra()
    {
        return $this->hasOne('App\Models\Compra', 'id', 'compra_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'producto_id');
    }
}
