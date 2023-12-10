<?php

namespace App\Http\Controllers;

use App\Models\Tramite;
use App\Models\CategoriaTramites;
use App\Models\Ubicacion;
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
        $categoriaId = $request->input('categoria'); // Obtén la categoría seleccionada desde el formulario

        $latestFirst = $request->input('latestFirst', false);
        $sortField = 'id_tramite';
        $sortDirection = $latestFirst ? 'desc' : 'asc';

        $categorias = CategoriaTramites::all();
        
        // Consulta de tramites con búsqueda y filtro por categoría
        $tramites = Tramite::where('estado', 1)
            ->where(function ($query) use ($search) {
                $query->where('nombre_tramite', 'LIKE', "%$search%")
                    ->orWhere('duracion_tramite', 'LIKE', "%$search%")
                    ->orWhere('id_categoria_tramites', 'LIKE', "%$search%");
            })
            ->when($categoriaId, function ($query, $categoriaId) {
                $query->where('id_categoria_tramites', $categoriaId);
            })
            ->orderBy($sortField, $sortDirection)
            ->paginate(10);

        return view('admin.tramite.index', compact('tramites', 'search', 'categorias', 'categoriaId', 'latestFirst'))
            ->with('i', (request()->input('page', 1) - 1) * $tramites->perPage());
    }



    public function inactivos()
    {
        $tramitesInactivos = Tramite::where('estado', 0)->paginate();
        return view('admin.tramite.inactivos', compact('tramitesInactivos'))
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
        $categoriasTramites = CategoriaTramites::all();
        $ubicaciones = Ubicacion::all();
        return view('admin.tramite.create', compact('tramite', 'categoriasTramites','ubicaciones'));
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
            ->with('success', 'Trámite agregado exitosamente.');
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

        return view('admin.tramite.show', compact('tramite'));
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
        $categoriasTramites = CategoriaTramites::all();
        $ubicaciones = Ubicacion::all();
        if (!$tramite) {
            abort(404);
        }

        return view('admin.tramite.edit', compact('tramite', 'categoriasTramites','ubicaciones'));
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
            ->with('success', 'Trámite actualizado exitosamente');
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
            ->with('success', 'Tramite eliminado exitosamente');
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
            //return redirect()->route('tramites.inactivos')->with('success', 'Estado del trámite cambiado exitosamente');
            return redirect()->route('tramites.index')->with('success', 'Estado del trámite cambiado exitosamente');
        }
    }






}
