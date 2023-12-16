<?php

namespace App\Http\Livewire;

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
    public $cliente = "", $importe = "", $observaciones = "", $arrParamentros, $tipopago = '';

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
            }

            switch ($this->arrParamentros[0]) {
                case 'suscripcionservicio': {
                        foreach ($this->arrParamentros[2] as $pedido) {
                            $detalle = Vntdetalleventa::create([
                                'vntventa_id' => $venta->id,
                                'servicio_id' => $pedido[0]['id'],
                                'detalle' => $pedido[0]['nombre'] . ' - Inicio: ' . $pedido[1] . ' - Horario: ' . $pedido[2][1],
                                'cantidad' => 1,
                                'preciounitario' => $pedido[0]['precio'],
                                'subtotal' => 1 * $pedido[0]['precio'],
                            ]);

                            $final = new DateTime($pedido[1]);
                            if ($pedido[0]['cantdias'] >= 30) {
                                $final->modify('+ 1month');
                                $final->modify('- 1day');
                            } else {
                                $cant = $pedido[0]['cantdias'] - 1;
                                $final->modify('+ '.$cant.'day');
                            }


                            $final = $final->format('Y-m-d');
                            // REG. SUSCRIPCION
                            $suscripcion = Suscripcione::create([
                                'cliente_id' => $this->arrParamentros[1]['id'],
                                'servicio_id' => $pedido[0]['id'],
                                'vntventa_id' => $venta->id,
                                'inicio' => $pedido[1],
                                'final' => $final,
                                'horarioservicio_id' => $pedido[2][0],
                                'horario' => $pedido[2][1],
                            ]);
                        }

                        DB::commit();
                        return redirect()->route('ventas.suscripciones')->with('success', 'Venta realizada con exito!');
                    }
                    break;
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('errorOK', $th->getMessage());
        }
    }
}
