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
    public function index(Request $request)
{
    $search = $request->input('search');

    // Consulta de tramites con búsqueda
    $tramites = Tramite::where('estado', 1)
        ->where(function ($query) use ($search) {
            $query->where('nombre_tramite', 'LIKE', "%$search%")
                ->orWhere('duracion_tramite', 'LIKE', "%$search%")
                ->orWhere('id_categoria_tramites', 'LIKE', "%$search%");
        })
        ->paginate();

    return view('tramite.index', compact('tramites', 'search'))
        ->with('i', (request()->input('page', 1) - 1) * $tramites->perPage());
}


    public function inactivos()
    {
        $tramitesInactivos = Tramite::where('estado', 0)->paginate();
        return view('tramite.inactivos', compact('tramitesInactivos'))
            ->with('i', (request()->input('page', 1) - 1) * $tramitesInactivos->perPage());;
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
        //request()->validate(Tramite::$rules);

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
        $tramite = Tramite::where('Id_tramite', $id)->first();

        if (!$tramite) {
            abort(404);
        }

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
        $tramite = Tramite::where('Id_tramite', $id)->first();

        if (!$tramite) {
            abort(404);
        }

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
        //request()->validate(Tramite::$rules);

        $tramite->update($request->all());

        return redirect()->route('tramites.index')
            ->with('success', 'Tramite updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    /*public function destroy($id)
    {
        $tramite = Tramite::find($id)->delete();

        return redirect()->route('tramites.index')
            ->with('success', 'Tramite deleted successfully');
    }*/
    public function cambiarEstado($id)
    {
        $tramite = Tramite::find($id);

        if (!$tramite) {
            return redirect()->route('tramites.index')->with('error', 'Trámite no encontrado');
        }

        // Cambia el estado
        $nuevoEstado = $tramite->estado == 1 ? 0 : 1;
        $tramite->estado = $nuevoEstado;
        $tramite->save();

        if ($nuevoEstado == 1) {
            return redirect()->route('tramites.index')->with('success', 'Estado del trámite cambiado exitosamente');
        } else {
            return redirect()->route('tramites.inactivos')->with('success', 'Estado del trámite cambiado exitosamente');
        }
    }






}
