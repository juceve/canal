<?php

namespace App\Http\Controllers;

use App\Models\Datosfisico;
use Illuminate\Http\Request;

/**
 * Class DatosfisicoController
 * @package App\Http\Controllers
 */
class DatosfisicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosfisicos = Datosfisico::all();

        return view('datosfisico.index', compact('datosfisicos'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosfisico = new Datosfisico();
        return view('datosfisico.create', compact('datosfisico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Datosfisico::$rules);

        $datosfisico = Datosfisico::create($request->all());

        return redirect()->route('datosfisicos.index')
            ->with('success', 'Datosfisico created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datosfisico = Datosfisico::find($id);

        return view('datosfisico.show', compact('datosfisico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datosfisico = Datosfisico::find($id);

        return view('datosfisico.edit', compact('datosfisico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Datosfisico $datosfisico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datosfisico $datosfisico)
    {
        request()->validate(Datosfisico::$rules);

        $datosfisico->update($request->all());

        return redirect()->route('datosfisicos.index')
            ->with('success', 'Datosfisico updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $datosfisico = Datosfisico::find($id)->delete();

        return redirect()->route('datosfisicos.index')
            ->with('success', 'Datosfisico deleted successfully');
    }
}
