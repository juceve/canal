<?php

namespace App\Http\Livewire;

use App\Models\Servicio;
use App\Models\Suscripcione;
use App\Models\Vntdetalleventa;
use App\Models\Vntpago;
use App\Models\Vnttipopago;
use App\Models\Vntventa;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Modalpago extends Component
{
    public $cliente = "", $importe = "", $observaciones = "", $arrParamentros, $tipopago = '', $data = 0;

    public function render()
    {
        $tipopagos = Vnttipopago::all()->pluck('nombre', 'id');
        return view('livewire.modalpago', compact('tipopagos'));
    }

    protected $listeners = ['paramentros' => 'recibeParamentros'];

    public function recibeParamentros($arrParamentros)
    {
        $this->arrParamentros = $arrParamentros;
        $this->cliente = $arrParamentros[1]['nombre'];
        $this->importe = $arrParamentros[3];
    }

    protected $rules = [
        'cliente' => 'required',
        'tipopago' => 'required',
        'importe' => 'required',
    ];

    public function procesar()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $tipo = Vnttipopago::find($this->tipopago);
            $data = "";

            $venta = Vntventa::create([
                'user_id' => Auth::user()->id,
                'fecha' => date('Y-m-d'),
                'cliente' => $this->cliente,
                'cliente_id' => $this->arrParamentros[1]['id'],
                'importe' => $this->arrParamentros[3] * $tipo->factor,
                'observaciones' => $this->observaciones,
                'vntestadopago_id' => 1,
                'status' => 1,
            ]);

            $data .= $venta->id . "|" . $venta->fecha . "|" . $venta->cliente . "|" . $venta->importe;

            $pago = null;
            if (($this->arrParamentros[3] * $tipo->factor) > 0) {
                $pago = Vntpago::create([
                    'user_id' => Auth::user()->id,
                    'fechahora' => date('Y-m-d H:i:s'),
                    'vntventa_id' => $venta->id,
                    'vnttipopago_id' => $tipo->id,
                    'tipopago' => $tipo->nombrecorto,
                    'monto' => $this->arrParamentros[3],
                    'status' => 1,
                ]);

                $data .= "|" . $tipo->nombre . "|" . $tipo->nombrecorto;
            }

            switch ($this->arrParamentros[0]) {
                case 'suscripcionservicio': {
                        $detalles = "";

                        foreach ($this->arrParamentros[2] as $pedido) {
                            $servicio = Servicio::find($pedido[0]['id']);

                            $detalle = Vntdetalleventa::create([
                                'vntventa_id' => $venta->id,
                                'servicio_id' => $pedido[0]['id'],
                                'detalle' => $pedido[0]['nombre'] . ' - Inicio: ' . $pedido[1] . ' - Horario: ' . $pedido[2][1],
                                'cantidad' => $pedido[3],
                                'preciounitario' => $pedido[0]['precio'],
                                'subtotal' => $pedido[3] * $pedido[0]['precio'],
                            ]);

                            $detalles .= $detalle->detalle . "~" . $detalle->cantidad . "~" . $detalle->preciounitario . "$";


                            // LOGICA CANTIDAD DIAS DE SUSCRIPCION - MODALIDAD POR DIA
                            $inicio = new DateTime($pedido[1]);
                            $final = "";
                            $creditos = "";
                            $creditos = $pedido[0]['creditos'] * $pedido[3];

                            if ($servicio->modalidadservicio_id == 1) {
                                $final = new DateTime($pedido[1]);
                                if ($pedido[0]['creditos'] >= 30) {
                                    $final->modify('+ 1month');
                                    $final->modify('- 1day');

                                    $creditos = $pedido[3];
                                } else {

                                    $cant = $pedido[0]['creditos'] - 1;
                                    $final->modify('+ ' . $cant . 'day');
                                    $creditos = $pedido[3];
                                }
                                $final = $final->format('Y-m-d');
                            }

                            ///////////////////////////////////////////////////////////


                            // REG. SUSCRIPCION
                            // dd($creditos);
                            $suscripcion = Suscripcione::create([
                                'cliente_id' => $this->arrParamentros[1]['id'],
                                'servicio_id' => $servicio->id,
                                'modalidadservicio_id' => $servicio->modalidadservicio_id,
                                'vntventa_id' => $venta->id,
                                'inicio' => $pedido[1],
                                'final' => $final,
                                'creditos' => $creditos,
                                'horarioservicio_id' => $pedido[2][0],
                                'horario' => $pedido[2][1],
                            ]);
                        }
                        $detalles = substr($detalles, 0, -1);
                        // $detalles = substr($detalles, 0, -1);

                        $data .= "|" . $detalles;
                    }
                    break;
            }

            DB::commit();


            $this->emit('impservicios', $data);

            return redirect()->route('ventas.suscripciones')->with('success', 'Venta realizada con exito!');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('errorOK', $th->getMessage());
        }
    }
}
