<?php

namespace App\Http\Controllers;

use App\Models\Naf;
use Illuminate\Http\Request;
use App\Models\Ubicacion;

/**
 * Class NafController
 * @package App\Http\Controllers
 */
class NafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nafs = Naf::paginate();

        return view('admin.naf.index', compact('nafs'))
            ->with('i', (request()->input('page', 1) - 1) * $nafs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $naf = new Naf();
        $ubicaciones = Ubicacion::all();
        return view('admin.naf.create', compact('naf','ubicaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Naf::$rules);

        $naf = Naf::create($request->all());

        return redirect()->route('nafs.index')
            ->with('success', 'Naf created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *//*
    public function show($id)
    {
        $naf = Naf::find($id);

        return view('admin.naf.show', compact('naf'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $naf = Naf::find($id);
        $ubicaciones = Ubicacion::all();

        return view('admin.naf.edit', compact('naf', 'ubicaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Naf $naf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Naf $naf)
    {
        //request()->validate(Naf::$rules);

        $naf->update($request->all());

        return redirect()->route('nafs.index')
            ->with('success', 'Naf updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $naf = Naf::find($id)->delete();

        return redirect()->route('nafs.index')
            ->with('success', 'Naf deleted successfully');
    }
}
