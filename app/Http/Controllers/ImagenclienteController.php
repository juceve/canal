<?php

namespace App\Http\Controllers;

use App\Models\Imagencliente;
use Illuminate\Http\Request;

/**
 * Class ImagenclienteController
 * @package App\Http\Controllers
 */
class ImagenclienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenclientes = Imagencliente::paginate();

        return view('imagencliente.index', compact('imagenclientes'))
            ->with('i', (request()->input('page', 1) - 1) * $imagenclientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imagencliente = new Imagencliente();
        return view('imagencliente.create', compact('imagencliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Imagencliente::$rules);

        $imagencliente = Imagencliente::create($request->all());

        return redirect()->route('imagenclientes.index')
            ->with('success', 'Imagencliente created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagencliente = Imagencliente::find($id);

        return view('imagencliente.show', compact('imagencliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagencliente = Imagencliente::find($id);

        return view('imagencliente.edit', compact('imagencliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Imagencliente $imagencliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagencliente $imagencliente)
    {
        request()->validate(Imagencliente::$rules);

        $imagencliente->update($request->all());

        return redirect()->route('imagenclientes.index')
            ->with('success', 'Imagencliente updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $imagencliente = Imagencliente::find($id)->delete();

        return redirect()->route('imagenclientes.index')
            ->with('success', 'Imagencliente deleted successfully');
    }
}
