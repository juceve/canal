<?php

namespace App\Http\Controllers;

use App\Models\Suscripcione;
use Illuminate\Http\Request;

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
        $suscripciones = Suscripcione::paginate();

        return view('suscripcione.index', compact('suscripciones'))
            ->with('i', (request()->input('page', 1) - 1) * $suscripciones->perPage());
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
}
