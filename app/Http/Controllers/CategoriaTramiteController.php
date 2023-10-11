<?php

namespace App\Http\Controllers;

use App\Models\CategoriaTramite;
use App\Models\CategoriaTramites;
use Illuminate\Http\Request;

/**
 * Class CategoriaTramiteController
 * @package App\Http\Controllers
 */
class CategoriaTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriaTramites = CategoriaTramites::paginate();

        return view('categoria-tramite.index', compact('categoriaTramites'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriaTramites->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriaTramite = new CategoriaTramites();
        return view('categoria-tramite.create', compact('categoriaTramite'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CategoriaTramites::$rules);

        $categoriaTramite = CategoriaTramites::create($request->all());

        return redirect()->route('categoria-tramites.index')
            ->with('success', 'CategoriaTramite created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriaTramite = CategoriaTramites::find($id);

        return view('categoria-tramite.show', compact('categoriaTramite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriaTramite = CategoriaTramites::find($id);

        return view('categoria-tramite.edit', compact('categoriaTramite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CategoriaTramites $categoriaTramite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaTramites $categoriaTramite)
    {
        request()->validate(CategoriaTramites::$rules);

        $categoriaTramite->update($request->all());

        return redirect()->route('categoria-tramites.index')
            ->with('success', 'CategoriaTramite updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoriaTramite = CategoriaTramites::find($id)->delete();

        return redirect()->route('categoria-tramites.index')
            ->with('success', 'CategoriaTramite deleted successfully');
    }
}
