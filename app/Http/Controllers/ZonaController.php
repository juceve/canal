<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use Illuminate\Http\Request;

/**
 * Class ZonaController
 * @package App\Http\Controllers
 */
class ZonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:zonas.index')->only('index');
        $this->middleware('can:zonas.create')->only('create', 'store');
        $this->middleware('can:zonas.edit')->only('edit', 'update');
        $this->middleware('can:zonas.destroy')->only('destroy');
    }
    public function index()
    {
        $zonas = Zona::all();

        return view('zona.index', compact('zonas'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zona = new Zona();
        return view('zona.create', compact('zona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Zona::$rules);

        $zona = Zona::create($request->all());

        return redirect()->route('zonas.index')
            ->with('success', 'Zona created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zona = Zona::find($id);

        return view('zona.show', compact('zona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zona = Zona::find($id);

        return view('zona.edit', compact('zona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Zona $zona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zona $zona)
    {
        request()->validate(Zona::$rules);

        $zona->update($request->all());

        return redirect()->route('zonas.index')
            ->with('success', 'Zona updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $zona = Zona::find($id)->delete();

        return redirect()->route('zonas.index')
            ->with('success', 'Zona deleted successfully');
    }
}
