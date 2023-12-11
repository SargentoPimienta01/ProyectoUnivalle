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
    public function index(Request $request)
    {
        $search = $request->input('search');

        $latestFirst = $request->input('latestFirst', false);
        $sortField = 'id_plataforma_de_atencion';
        $sortDirection = $latestFirst ? 'desc' : 'asc';

        $plataformaDeAtencions = PlataformaDeAtencion::where('estado',1)
        ->where(function ($query) use ($search) {
            $query->where('servicio', 'LIKE', "%$search%")
                ->orWhere('descripcion', 'LIKE', "%$search%")
                ->orWhere('requisitos', 'LIKE', "%$search%");
        })
        ->orderBy($sortField, $sortDirection)
        ->paginate(10);

        return view('admin.plataforma-de-atencion.index', compact('plataformaDeAtencions', 'search', 'latestFirst'))
            ->with('i', (request()->input('page', 1) - 1) * $plataformaDeAtencions->perPage());
    }

    public function inactivos()
    {
        $plataformaDeAtencions = PlataformaDeAtencion::where('estado', 0)->paginate();
        return view('admin.plataforma-de-atencion.inactivos', compact('plataformaDeAtencions'))
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
        return view('admin.plataforma-de-atencion.create', compact('plataformaDeAtencion'));
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
            ->with('success', 'Servicio de Plataforma de atención creado exitosamente.');
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

        return view('admin.plataforma-de-atencion.show', compact('plataformaDeAtencion'));
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

        return view('admin.plataforma-de-atencion.edit', compact('plataformaDeAtencion'));
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
            ->with('success', 'Servicio de Plataforma de atención actualizado exitosamente');
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
            ->with('success', 'Servicio de Plataforma de atención eliminado exitosamente');
    }

    public function cambiarEstado($id)
    {
        $plataforma = PlataformaDeAtencion::find($id);

        if (!$plataforma) {
            return redirect()->route('plataformas.index')->with('error', 'Plataforma de Atención no encontrada');
        }

        // Cambia el estado
        $nuevoEstado = $plataforma->estado == 1 ? 0 : 1;
        $plataforma->estado = $nuevoEstado;
        $plataforma->save();

        if ($nuevoEstado == 1) {
            return redirect()->route('plataforma-de-atencions.index')->with('success', 'Estado del servicio de Plataforma de Atención cambiado exitosamente');
        } else {
            //return redirect()->route('admin.plataforma-de-atencion.inactivos')->with('success', 'Estado de la Plataforma de Atención cambiado exitosamente');
            return redirect()->route('plataforma-de-atencions.index')->with('success', 'Estado del servicio Plataforma de Atención cambiado exitosamente');
        }
    }

}
