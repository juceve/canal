<?php

namespace App\Http\Controllers;

use App\Models\Detalleobjetivo;
use Illuminate\Http\Request;

/**
 * Class DetalleobjetivoController
 * @package App\Http\Controllers
 */
class DetalleobjetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalleobjetivos = Detalleobjetivo::paginate();

        return view('detalleobjetivo.index', compact('detalleobjetivos'))
            ->with('i', (request()->input('page', 1) - 1) * $detalleobjetivos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalleobjetivo = new Detalleobjetivo();
        return view('detalleobjetivo.create', compact('detalleobjetivo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Detalleobjetivo::$rules);

        $detalleobjetivo = Detalleobjetivo::create($request->all());

        return redirect()->route('detalleobjetivos.index')
            ->with('success', 'Detalleobjetivo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleobjetivo = Detalleobjetivo::find($id);

        return view('detalleobjetivo.show', compact('detalleobjetivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleobjetivo = Detalleobjetivo::find($id);

        return view('detalleobjetivo.edit', compact('detalleobjetivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Detalleobjetivo $detalleobjetivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detalleobjetivo $detalleobjetivo)
    {
        request()->validate(Detalleobjetivo::$rules);

        $detalleobjetivo->update($request->all());

        return redirect()->route('detalleobjetivos.index')
            ->with('success', 'Detalleobjetivo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalleobjetivo = Detalleobjetivo::find($id)->delete();

        return redirect()->route('detalleobjetivos.index')
            ->with('success', 'Detalleobjetivo deleted successfully');
    }
}
