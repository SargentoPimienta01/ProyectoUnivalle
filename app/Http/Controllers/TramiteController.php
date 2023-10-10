<?php

namespace App\Http\Controllers;

use App\Models\Tramite;
use Illuminate\Http\Request;

/**
 * Class TramiteController
 * @package App\Http\Controllers
 */
class TramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tramites = Tramite::paginate();

        return view('tramite.index', compact('tramites'))
            ->with('i', (request()->input('page', 1) - 1) * $tramites->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tramite = new Tramite();
        return view('tramite.create', compact('tramite'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tramite::$rules);

        $tramite = Tramite::create($request->all());

        return redirect()->route('tramites.index')
            ->with('success', 'Tramite created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tramite = Tramite::find($id);

        return view('tramite.show', compact('tramite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tramite = Tramite::find($id);

        return view('tramite.edit', compact('tramite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tramite $tramite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tramite $tramite)
    {
        request()->validate(Tramite::$rules);

        $tramite->update($request->all());

        return redirect()->route('tramites.index')
            ->with('success', 'Tramite updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tramite = Tramite::find($id)->delete();

        return redirect()->route('tramites.index')
            ->with('success', 'Tramite deleted successfully');
    }
}
