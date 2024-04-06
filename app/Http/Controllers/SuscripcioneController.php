<?php

namespace App\Http\Controllers;

use App\Models\Suscripcione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class SuscripcioneController
 * @package App\Http\Controllers
 */
class SuscripcioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suscripciones = Suscripcione::all();

        return view('suscripcione.index', compact('suscripciones'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suscripcione = new Suscripcione();
        return view('suscripcione.create', compact('suscripcione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Suscripcione::$rules);

        $suscripcione = Suscripcione::create($request->all());

        return redirect()->route('suscripciones.index')
            ->with('success', 'Suscripcione creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suscripcione = Suscripcione::find($id);

        return view('suscripcione.show', compact('suscripcione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suscripcione = Suscripcione::find($id);

        return view('suscripcione.edit', compact('suscripcione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Suscripcione $suscripcione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscripcione $suscripcione)
    {
        request()->validate(Suscripcione::$rules);

        $suscripcione->update($request->all());

        return redirect()->route('suscripciones.index')
            ->with('success', 'Suscripcione actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $suscripcione = Suscripcione::find($id);
        $suscripcione->status = 0;
        $suscripcione->save();

        return redirect()->route('suscripciones.index')
            ->with('success', 'Suscripcione anulada correctamente');
    }

    public function getDataSuscripciones()
    {
        $mesesData = [
            ["mes" => "", "cantidad" => 0],
            ["mes" => "Enero", "cantidad" => 0],
            ["mes" => "Febrero", "cantidad" => 0],
            ["mes" => "Marzo", "cantidad" => 0],
            ["mes" => "Abril", "cantidad" => 0],
            ["mes" => "Mayo", "cantidad" => 0],
            ["mes" => "Junio", "cantidad" => 0],
            ["mes" => "Julio", "cantidad" => 0],
            ["mes" => "Agosto", "cantidad" => 0],
            ["mes" => "Septiembre", "cantidad" => 0],
            ["mes" => "Octubre", "cantidad" => 0],
            ["mes" => "Noviembre", "cantidad" => 0],
            ["mes" => "Diciembre", "cantidad" => 0],
        ];


        $sql2 = "SELECT MONTH(s.created_at) mes, COUNT(*) cantidad, SUM(dv.preciounitario) total FROM suscripciones s
        INNER JOIN vntventas v ON v.id=s.vntventa_id
        INNER JOIN vntdetalleventas dv ON dv.vntventa_id=v.id
        WHERE MONTH(s.created_at) IN (1,2,3,4,5,6,7,8,9,10,11,12)
        AND YEAR(s.created_at) = " . date('Y') . "
        GROUP BY MONTH(s.created_at) ORDER BY MONTH(s.created_at)";
        $resultado2 = DB::select($sql2);
        $cantidades = [];
        $meses = [];
        foreach ($resultado2 as $item) {
            $mesesData[$item->mes]['cantidad'] = $item->cantidad;
        }
        foreach ($mesesData as $item) {
            // if ($item['mes'] != "") {
            $meses[] = $item['mes'];
            $cantidades[] = $item['cantidad'];
            // }
        }
        // dd($mesesData[4]['cantidad']);
        return response()->json(["meses" => $meses, "cantidades" => $cantidades]);
    }
};
