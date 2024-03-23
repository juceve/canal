<?php

namespace App\Http\Controllers;

use App\Models\Feriado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class FeriadoController
 * @package App\Http\Controllers
 */
class FeriadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feriados = Feriado::all();

        return view('feriado.index', compact('feriados'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feriado = new Feriado();
        return view('feriado.create', compact('feriado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Feriado::$rules);

        DB::beginTransaction();
        $fecha = "";
        if ($request->gestion) {
            $fecha = $request->gestion . "-" . $request->mesdia;
        } else {
            $fecha = date('Y') . "-" . $request->mesdia;
        }

        $feriado = Feriado::create($request->all());
        if (adDiasFeriadosSusc($fecha)) {
            DB::commit();
            return redirect()->route('feriados.index')
                ->with('success', 'Feriado creado correctamente.');
        } else {
            DB::rollBack();
            return redirect()->route('feriados.create')
                ->with('error', 'Ha ocurrido un error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feriado = Feriado::find($id);

        return view('feriado.show', compact('feriado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feriado = Feriado::find($id);

        return view('feriado.edit', compact('feriado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Feriado $feriado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feriado $feriado)
    {
        request()->validate(Feriado::$rules);

        $feriado->update($request->all());

        return redirect()->route('feriados.index')
            ->with('success', 'Feriado editado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $feriado = Feriado::find($id)->delete();

        return redirect()->route('feriados.index')
            ->with('success', 'Feriado eliminado correctamente.');
    }
}
