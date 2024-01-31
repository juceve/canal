<?php

namespace App\Http\Controllers;

use App\Models\Modimpresion;
use Illuminate\Http\Request;

/**
 * Class ModimpresionController
 * @package App\Http\Controllers
 */
class ModimpresionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modimpresions = Modimpresion::paginate();

        return view('modimpresion.index', compact('modimpresions'))
            ->with('i', (request()->input('page', 1) - 1) * $modimpresions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modimpresion = new Modimpresion();
        return view('modimpresion.create', compact('modimpresion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Modimpresion::$rules);

        $modimpresion = Modimpresion::create($request->all());

        return redirect()->route('modimpresions.index')
            ->with('success', 'Modimpresion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modimpresion = Modimpresion::find($id);

        return view('modimpresion.show', compact('modimpresion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modimpresion = Modimpresion::find($id);

        return view('modimpresion.edit', compact('modimpresion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Modimpresion $modimpresion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modimpresion $modimpresion)
    {
        request()->validate(Modimpresion::$rules);

        $modimpresion->update($request->all());

        return redirect()->route('modimpresions.index')
            ->with('success', 'Modimpresion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $modimpresion = Modimpresion::find($id)->delete();

        return redirect()->route('modimpresions.index')
            ->with('success', 'Modimpresion deleted successfully');
    }
}
