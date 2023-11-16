<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

/**
 * Class UbicacionController
 * @package App\Http\Controllers
 */
class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $ubicaciones = Ubicacion::where('estado', 1)
            ->where(function ($query) use ($search) {
                $query->where('nombre_ubicacion', 'like', "%$search%");
            })
            ->paginate(10);

        return view('admin.ubicacion.index', compact('ubicaciones', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $ubicaciones->perPage());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ubicacion = new Ubicacion();
        return view('admin.ubicacion.create', compact('ubicacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ubicacion::$rules);

        $ubicacion = Ubicacion::create($request->all());

        return redirect()->route('ubicacion.index')
            ->with('success', 'Ubicacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ubicacion = Ubicacion::find($id);

        return view('admin.ubicacion.show', compact('ubicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ubicacion = Ubicacion::find($id);

        return view('admin.ubicacion.edit', compact('ubicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ubicacion $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ubicacion $ubicacion)
    {
        request()->validate(Ubicacion::$rules);

        $ubicacion->update($request->all());

        return redirect()->route('ubicacion.index')
            ->with('success', 'Ubicacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ubicacion = Ubicacion::find($id)->delete();

        return redirect()->route('ubicacion.index')
            ->with('success', 'Ubicacion deleted successfully');
    }

    public function toggleEstado($id)
    {
        $ubicacion = Ubicacion::find($id);

        if (!$ubicacion) {
            return redirect()->back()->with('error', 'Ubicación no encontrada.');
        }

        // Cambiar el estado
        $ubicacion->estado = !$ubicacion->estado;
        $ubicacion->save();

        $message = $ubicacion->estado ? 'Ubicación activada exitosamente.' : 'Ubicación desactivada exitosamente.';

        return redirect()->route($ubicacion->estado ? 'ubicacion.index' : 'admin.ubicacion.inactivas')->with('success', $message);
    }


    public function inactivas(Request $request)
    {
        $search = $request->input('search');

        $ubicacionesInactivas = Ubicacion::where('estado', 0)
            ->where(function ($query) use ($search) {
                $query->where('nombre_ubicacion', 'like', "%$search%");
            })
            ->paginate(10);

        return view('admin.ubicacion.inactivas', compact('ubicacionesInactivas', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $ubicacionesInactivas->perPage());
    }

}
