<?php

use App\Models\Compra;
use App\Models\Feriado;
use App\Models\Suscripcione;
use App\Models\Vntventa;
use Illuminate\Support\Facades\DB;

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

function calcularFechaFinal($inicio, $final)
{

  $final = new DateTime($final);
  $inicio = new DateTime($inicio);
  $cantferiados = 0;

  for ($date = clone $inicio; $date <= $final; $date->modify('+1 day')) {
    // Revisar si es sábado o domingo
    if ($date->format('N') != 6 && $date->format('N') != 7) {
      if (esFeriado($date->format('Y-m-d'))) {
        $cantferiados++;
      }
    }
  }

  if ($cantferiados) {
    $final->modify("+$cantferiados days");
  }


  return $final->format('Y-m-d');
}

function esFeriado($fecha)
{
  $arrFecha = explode("-", $fecha);

  $feriado = Feriado::where([
    ['mesdia', $arrFecha[1] . "-" . $arrFecha[2]],
    ['gestion', $arrFecha[0]]
  ])
    ->orWhere([
      ['mesdia', $arrFecha[1] . "-" . $arrFecha[2]],
      ['gestion', '0']
    ])
    ->first();
  if ($feriado) {
    return true;
  } else {
    return false;
  }
}

function adDiasFeriadosSusc($fecha)
{
  $date = new DateTime($fecha);
  if ($date->format('N') != 6 && $date->format('N') != 7) {
    DB::beginTransaction();
    try {
      $suscripciones = Suscripcione::where([
        ["inicio", "<=", $fecha],
        ["final", ">=", $fecha],
        ["status", true],
      ])->get();

      if ($suscripciones->count() > 0) {
        foreach ($suscripciones as $item) {
          $final = new DateTime($item->final);
          $final = $final->modify("+1 days");
          $item->final = $final->format('Y-m-d');
          $item->save();
        }
      }

      DB::commit();
      return true;
    } catch (\Throwable $th) {

      DB::rollBack();
      return false;
    }
  } else {
    return true;
  }
}

function adLicSusCli($fecha, $cliente_id)
{
  $date = new DateTime($fecha);
  if ($date->format('N') != 6 && $date->format('N') != 7) {
    DB::beginTransaction();
    try {
      $suscripciones = Suscripcione::where([
        ["inicio", "<=", $fecha],
        ["final", ">=", $fecha],
        ["cliente_id", ">=", $cliente_id],
        ["status", true],
      ])->get();

      if ($suscripciones->count() > 0) {
        foreach ($suscripciones as $item) {
          $final = new DateTime($item->final);
          $final = $final->modify("+1 days");
          $item->final = $final->format('Y-m-d');
          $item->save();
        }
      }

      DB::commit();
      return true;
    } catch (\Throwable $th) {

      DB::rollBack();
      return false;
    }
  } else {
    return true;
  }
}

function remLicSusCli($fecha, $cliente_id)
{
  $date = new DateTime($fecha);
  if ($date->format('N') != 6 && $date->format('N') != 7) {
    DB::beginTransaction();
    try {
      $suscripciones = Suscripcione::where([
        ["inicio", "<=", $fecha],
        ["final", ">=", $fecha],
        ["cliente_id", ">=", $cliente_id],
        ["status", true],
      ])->get();

      if ($suscripciones->count() > 0) {
        foreach ($suscripciones as $item) {
          $final = new DateTime($item->final);
          $final = $final->modify("-1 days");
          $item->final = $final->format('Y-m-d');
          $item->save();
        }
      }

      DB::commit();
      return true;
    } catch (\Throwable $th) {

      DB::rollBack();
      return false;
    }
  } else {
    return true;
  }
}
