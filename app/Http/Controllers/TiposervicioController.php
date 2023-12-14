<?php

namespace App\Http\Controllers;

use App\Models\Tiposervicio;
use Illuminate\Http\Request;

/**
 * Class TiposervicioController
 * @package App\Http\Controllers
 */
class TiposervicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposervicios = Tiposervicio::paginate();

        return view('tiposervicio.index', compact('tiposervicios'))
            ->with('i', (request()->input('page', 1) - 1) * $tiposervicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposervicio = new Tiposervicio();
        return view('tiposervicio.create', compact('tiposervicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tiposervicio::$rules);

        $tiposervicio = Tiposervicio::create($request->all());

        return redirect()->route('tiposervicios.index')
            ->with('success', 'Tiposervicio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiposervicio = Tiposervicio::find($id);

        return view('tiposervicio.show', compact('tiposervicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposervicio = Tiposervicio::find($id);

        return view('tiposervicio.edit', compact('tiposervicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tiposervicio $tiposervicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiposervicio $tiposervicio)
    {
        request()->validate(Tiposervicio::$rules);

        $tiposervicio->update($request->all());

        return redirect()->route('tiposervicios.index')
            ->with('success', 'Tiposervicio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tiposervicio = Tiposervicio::find($id)->delete();

        return redirect()->route('tiposervicios.index')
            ->with('success', 'Tiposervicio deleted successfully');
    }
}
