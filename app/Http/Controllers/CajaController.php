<?php

namespace App\Http\Controllers;

use App\Models\Caja; // Asegúrate de importar el modelo Caja
use Illuminate\Http\Request;

class CajaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $cajas = Caja::where('estado', 1)
            ->where(function ($query) use ($search) {
                $query->where('nombre_caja', 'LIKE', "%$search%")
                    ->orWhere('descripcion_caja', 'LIKE', "%$search%");
            })
            ->paginate();

        return view('admin.caja.index', compact('cajas', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $cajas->perPage());
    }

    public function create()
    {
        $caja = new Caja();
        return view('admin.caja.create', compact('caja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caja = Caja::create($request->all());

        return redirect()->route('cajas.index')
            ->with('success', 'Caja created successfully.');
    }

    public function show($id)
    {
        $caja = Caja::find($id);

        return view('admin.caja.show', compact('caja'));
    }

    public function edit($id)
    {
        $caja = Caja::find($id);

        return view('admin.caja.edit', compact('caja'));
    }

    public function update(Request $request, Caja $caja)
    {
        $caja->update($request->all());

        return redirect()->route('cajas.index')
            ->with('success', 'Caja updated successfully');
    }

    public function destroy($id)
    {
        $caja = Caja::find($id)->delete();

        return redirect()->route('cajas.index')
            ->with('success', 'Caja deleted successfully');
    }

    public function cambiarEstado($id)
    {
        $caja = Caja::find($id);

        if (!$caja) {
            return redirect()->route('cajas.index')->with('error', 'Caja no encontrada');
        }

        // Cambia el estado
        $nuevoEstado = $caja->estado == 1 ? 0 : 1;
        $caja->estado = $nuevoEstado;
        $caja->save();

        if ($nuevoEstado == 1) {
            return redirect()->route('cajas.index')->with('success', 'Estado de la caja cambiado exitosamente');
        } else {
            return redirect()->route('cajas.inactivas')->with('success', 'Estado de la caja cambiado exitosamente');
        }
    }

    public function inactivas()
    {
        $cajas = Caja::where('estado', 0)->paginate();
        return view('admin.caja.inactivas', compact('cajas'));
    }


}
