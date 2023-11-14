<?php

namespace App\Http\Controllers;

use App\Models\PlataformaDeAtencion;
use Illuminate\Http\Request;

/**
 * Class PlataformaDeAtencionController
 * @package App\Http\Controllers
 */
class PlataformaDeAtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plataformaDeAtencions = PlataformaDeAtencion::paginate();

        return view('plataforma-de-atencion.index', compact('plataformaDeAtencions'))
            ->with('i', (request()->input('page', 1) - 1) * $plataformaDeAtencions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plataformaDeAtencion = new PlataformaDeAtencion();
        return view('plataforma-de-atencion.create', compact('plataformaDeAtencion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PlataformaDeAtencion::$rules);

        $plataformaDeAtencion = PlataformaDeAtencion::create($request->all());

        return redirect()->route('plataforma-de-atencions.index')
            ->with('success', 'PlataformaDeAtencion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plataformaDeAtencion = PlataformaDeAtencion::find($id);

        return view('plataforma-de-atencion.show', compact('plataformaDeAtencion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plataformaDeAtencion = PlataformaDeAtencion::find($id);

        return view('plataforma-de-atencion.edit', compact('plataformaDeAtencion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PlataformaDeAtencion $plataformaDeAtencion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlataformaDeAtencion $plataformaDeAtencion)
    {
        request()->validate(PlataformaDeAtencion::$rules);

        $plataformaDeAtencion->update($request->all());

        return redirect()->route('plataforma-de-atencions.index')
            ->with('success', 'PlataformaDeAtencion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $plataformaDeAtencion = PlataformaDeAtencion::find($id)->delete();

        return redirect()->route('plataforma-de-atencions.index')
            ->with('success', 'PlataformaDeAtencion deleted successfully');
    }
}
