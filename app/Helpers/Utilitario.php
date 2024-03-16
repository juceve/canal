<?php

use App\Models\Compra;
use App\Models\Vntventa;

function traeVenta($venta_id)
{
    $venta = Vntventa::find($venta_id)->toArray();
    return $venta;
}

function importeCompra($compra_id)
{
    $compra = Compra::find($compra_id);
    $compra_producto = $compra->compraProductos;
    $importe = 0;
    foreach ($compra_producto as $item) {
        $importe += $item->precio;
    }

    return $importe;
}
