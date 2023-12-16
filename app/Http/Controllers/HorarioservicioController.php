<?php

namespace App\Http\Controllers;

use App\Models\Horarioservicio;
use Illuminate\Http\Request;

/**
 * Class HorarioservicioController
 * @package App\Http\Controllers
 */
class HorarioservicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarioservicios = Horarioservicio::paginate();

        return view('horarioservicio.index', compact('horarioservicios'))
            ->with('i', (request()->input('page', 1) - 1) * $horarioservicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horarioservicio = new Horarioservicio();
        return view('horarioservicio.create', compact('horarioservicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Horarioservicio::$rules);

        $horarioservicio = Horarioservicio::create($request->all());

        return redirect()->route('horarioservicios.index')
            ->with('success', 'Horarioservicio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horarioservicio = Horarioservicio::find($id);

        return view('horarioservicio.show', compact('horarioservicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horarioservicio = Horarioservicio::find($id);

        return view('horarioservicio.edit', compact('horarioservicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Horarioservicio $horarioservicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horarioservicio $horarioservicio)
    {
        request()->validate(Horarioservicio::$rules);

        $horarioservicio->update($request->all());

        return redirect()->route('horarioservicios.index')
            ->with('success', 'Horarioservicio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $horarioservicio = Horarioservicio::find($id)->delete();

        return redirect()->route('horarioservicios.index')
            ->with('success', 'Horarioservicio deleted successfully');
    }
}
