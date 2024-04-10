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
function obtenerIniciales($nombre)
{
  $iniciales = ''; // Variable para almacenar las iniciales

  // Dividir el nombre en palabras
  $palabras = explode(' ', $nombre);

  // Iterar sobre cada palabra y obtener la primera letra
  foreach ($palabras as $palabra) {
    $inicial = substr($palabra, 0, 1); // Obtener la primera letra de la palabra
    $iniciales .= $inicial; // Agregar la inicial a la cadena de iniciales
  }

  return strtolower(substr($iniciales, 0, 2));
}

function generarNumeroAleatorio()
{
  $numeros_generados = array();
  $intentos_maximos = 1000;

  for ($i = 0; $i < $intentos_maximos; $i++) {
    $numero_aleatorio = str_pad(rand(0, 9999), 4, "0", STR_PAD_LEFT);
    if (!in_array($numero_aleatorio, $numeros_generados)) {
      $numeros_generados[] = $numero_aleatorio;
      return $numero_aleatorio;
    }
  }

  return "160";
}
