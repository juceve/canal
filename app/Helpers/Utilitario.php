<?php

use App\Models\Vntventa;

function traeVenta($venta_id)
{
    $venta = Vntventa::find($venta_id)->toArray();
    return $venta;
}
