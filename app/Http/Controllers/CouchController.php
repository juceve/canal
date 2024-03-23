<?php

namespace App\Http\Controllers;

use App\Models\Couch;
use Illuminate\Http\Request;

/**
 * Class CouchController
 * @package App\Http\Controllers
 */
class CouchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couches = Couch::paginate();

        return view('couch.index', compact('couches'))
            ->with('i', (request()->input('page', 1) - 1) * $couches->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $couch = new Couch();
        return view('couch.create', compact('couch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Couch::$rules);

        $couch = Couch::create($request->all());

        return redirect()->route('couches.index')
            ->with('success', 'Couch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $couch = Couch::find($id);

        return view('couch.show', compact('couch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $couch = Couch::find($id);

        return view('couch.edit', compact('couch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Couch $couch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Couch $couch)
    {
        request()->validate(Couch::$rules);

        $couch->update($request->all());

        return redirect()->route('couches.index')
            ->with('success', 'Couch updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $couch = Couch::find($id)->delete();

        return redirect()->route('couches.index')
            ->with('success', 'Couch deleted successfully');
    }
}
