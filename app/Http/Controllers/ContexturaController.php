<?php

namespace App\Http\Controllers;

use App\Models\Contextura;
use Illuminate\Http\Request;

/**
 * Class ContexturaController
 * @package App\Http\Controllers
 */
class ContexturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contexturas = Contextura::all();

        return view('contextura.index', compact('contexturas'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contextura = new Contextura();
        return view('contextura.create', compact('contextura'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Contextura::$rules);

        $contextura = Contextura::create($request->all());

        return redirect()->route('contexturas.index')
            ->with('success', 'Contextura created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contextura = Contextura::find($id);

        return view('contextura.show', compact('contextura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contextura = Contextura::find($id);

        return view('contextura.edit', compact('contextura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contextura $contextura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contextura $contextura)
    {
        request()->validate(Contextura::$rules);

        $contextura->update($request->all());

        return redirect()->route('contexturas.index')
            ->with('success', 'Contextura updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contextura = Contextura::find($id)->delete();

        return redirect()->route('contexturas.index')
            ->with('success', 'Contextura deleted successfully');
    }
}
