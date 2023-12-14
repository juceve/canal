<?php

namespace App\Http\Livewire;

use App\Models\Vntpago;
use App\Models\Vnttipopago;
use App\Models\Vntventa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Modalpago extends Component
{
    public $cliente = "", $importe = "", $observaciones = "", $arrParamentros, $tipopago='';

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
        $this->importe = $arrParamentros[4];
             
    }

    protected $rules = [
        'cliente' => 'required',
        'tipopago' => 'required',
        'importe' => 'required',
    ];

    public function procesar(){
        $this->validate();

        DB::beginTransaction();
        try {
            $tipo = Vnttipopago::find($this->tipopago);
            switch ($this->arrParamentros[0]) {                
                case 'suscripcionservicio': {
                        $venta = Vntventa::create([
                            'user_id' => Auth::user()->id,
                            'fecha' => date('Y-m-d'),
                            'cliente' => $this->cliente,
                            'cliente_id' => $this->arrParamentros[1]['id'],
                            'importe' => $this->arrParamentros[4] * $tipo->factor,
                            'observaciones' => $this->observaciones,
                            'vntestadopago_id' => 1,
                            'status' => 1,
                        ]);

                        $pago = null;
                        if (($this->arrParamentros[4] * $tipo->factor) > 0) {
                            $pago = Vntpago::create([
                                'user_id' => Auth::user()->id,
                                'fechahora' => date('Y-m-d H:i:s'),
                                'vntventa_id' => $venta->id,
                                'vnttipopago_id' => $tipo->id,
                                'tipopago' => $tipo->nombrecorto,
                                'monto' => $this->arrParamentros[4],
                                'status' => 1,
                            ]);
                        }
                         DB::commit();
                         return redirect()->route('ventas.suscripciones')->with('success','Venta realizada con exito!');
                    }
                    break;
            }
           
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('errorOK',$th->getMessage());
        }   
    }
}
