<?php

namespace App\Http\Controllers;

use App\Models\RequisitoTramite;
use Illuminate\Http\Request;

/**
 * Class RequisitoTramiteController
 * @package App\Http\Controllers
 */
class RequisitoTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitoTramites = RequisitoTramite::paginate();

        return view('requisito-tramite.index', compact('requisitoTramites'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitoTramites->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requisitoTramite = new RequisitoTramite();
        return view('requisito-tramite.create', compact('requisitoTramite'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RequisitoTramite::$rules);

        $requisitoTramite = RequisitoTramite::create($request->all());

        return redirect()->route('requisito-tramites.index')
            ->with('success', 'RequisitoTramite created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisitoTramite = RequisitoTramite::find($id);

        return view('requisito-tramite.show', compact('requisitoTramite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisitoTramite = RequisitoTramite::find($id);

        return view('requisito-tramite.edit', compact('requisitoTramite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RequisitoTramite $requisitoTramite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequisitoTramite $requisitoTramite)
    {
        request()->validate(RequisitoTramite::$rules);

        $requisitoTramite->update($request->all());

        return redirect()->route('requisito-tramites.index')
            ->with('success', 'RequisitoTramite updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $requisitoTramite = RequisitoTramite::find($id)->delete();

        return redirect()->route('requisito-tramites.index')
            ->with('success', 'RequisitoTramite deleted successfully');
    }
}
