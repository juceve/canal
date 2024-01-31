<?php

namespace App\Http\Controllers;

use App\Models\Modalidadservicio;
use Illuminate\Http\Request;

/**
 * Class ModalidadservicioController
 * @package App\Http\Controllers
 */
class ModalidadservicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidadservicios = Modalidadservicio::paginate();

        return view('modalidadservicio.index', compact('modalidadservicios'))
            ->with('i', (request()->input('page', 1) - 1) * $modalidadservicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modalidadservicio = new Modalidadservicio();
        return view('modalidadservicio.create', compact('modalidadservicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Modalidadservicio::$rules);

        $modalidadservicio = Modalidadservicio::create($request->all());

        return redirect()->route('modalidadservicios.index')
            ->with('success', 'Modalidadservicio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modalidadservicio = Modalidadservicio::find($id);

        return view('modalidadservicio.show', compact('modalidadservicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modalidadservicio = Modalidadservicio::find($id);

        return view('modalidadservicio.edit', compact('modalidadservicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Modalidadservicio $modalidadservicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modalidadservicio $modalidadservicio)
    {
        request()->validate(Modalidadservicio::$rules);

        $modalidadservicio->update($request->all());

        return redirect()->route('modalidadservicios.index')
            ->with('success', 'Modalidadservicio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $modalidadservicio = Modalidadservicio::find($id)->delete();

        return redirect()->route('modalidadservicios.index')
            ->with('success', 'Modalidadservicio deleted successfully');
    }
}
