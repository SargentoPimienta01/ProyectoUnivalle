<?php

namespace App\Http\Controllers;

use App\Models\Postgrado;
use Illuminate\Http\Request;

/**
 * Class PostgradoController
 * @package App\Http\Controllers
 */
class PostgradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoriaId = $request->input('categoria');

        $latestFirst = $request->input('latestFirst', false);
        $sortField = 'id_postgrado';
        $sortDirection = $latestFirst ? 'desc' : 'asc';

        // Consulta de Postgrado con búsqueda
        $postgrados = Postgrado::where('estado', 1)->where(function ($query) use ($search) {
                $query->where('nombre_programa', 'LIKE', "%$search%")
                    ->orWhere('descripcion', 'LIKE', "%$search%");
            })
            ->when($categoriaId, function ($query, $categoriaId) {
                $query->where('categoria', $categoriaId);
            })
            ->orderBy($sortField, $sortDirection)
            ->paginate(10);

        // Puedes agregar más lógica según tus necesidades para obtener datos adicionales, si es necesario.

        return view('admin.postgrado.index', compact('postgrados', 'search', 'latestFirst'))
            ->with('i', (request()->input('page', 1) - 1) * $postgrados->perPage());
    }

    public function inactivos()
    {
        $postgrados = Postgrado::where('estado', 0)->paginate();
        return view('admin.postgrado.inactivos', compact('postgrados'))
            ->with('i', (request()->input('page', 1) - 1) * $postgrados->perPage());;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postgrado = new Postgrado();
        return view('admin.postgrado.create', compact('postgrado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Postgrado::$rules);

        $postgrado = Postgrado::create($request->all());

        return redirect()->route('postgrados.index')
            ->with('success', 'Postgrado agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postgrado = Postgrado::find($id);

        return view('admin.postgrado.show', compact('postgrado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postgrado = Postgrado::where('Id_postgrado', $id)->first();

        if (!$postgrado) {
            // Manejar el caso en que no se encuentra el postgrado con el ID dado
            abort(404);
        }

        return view('admin.postgrado.edit', compact('postgrado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Postgrado $postgrado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postgrado $postgrado)
    {
        request()->validate(Postgrado::$rules);

        $postgrado->update($request->all());

        return redirect()->route('postgrados.index')
            ->with('success', 'Postgrado actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $postgrado = Postgrado::find($id)->delete();

        return redirect()->route('postgrados.index')
            ->with('success', 'Postgrado deleted successfully');
    }

    public function cambiarEstado($id)
    {
        $postgrado = Postgrado::find($id);

        if (!$postgrado) {
            return redirect()->route('postgrados.index')->with('error', 'Trámite no encontrado');
        }

        // Cambia el estado
        $nuevoEstado = $postgrado->estado == 1 ? 0 : 1;
        $postgrado->estado = $nuevoEstado;
        $postgrado->save();

        if ($nuevoEstado == 1) {
            return redirect()->route('postgrados.index')->with('success', 'Estado del trámite cambiado exitosamente');
        } else {
            //return redirect()->route('postgrados.inactivos')->with('success', 'Estado del trámite cambiado exitosamente');
            return redirect()->route('postgrados.index')->with('success', 'Estado del trámite cambiado exitosamente');
        }
    }
}
