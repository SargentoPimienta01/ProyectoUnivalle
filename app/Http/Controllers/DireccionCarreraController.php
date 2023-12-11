<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DireccionCarrera;
use App\Models\Ubicacion;

class DireccionCarreraController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Consulta de Direccion Carrera con búsqueda
        $direccionCarreras = DireccionCarrera::where('estado', 1)
            ->where(function ($query) use ($search) {
                $query->where('carrera', 'LIKE', "%$search%")
                    ->orWhere('descripcion', 'LIKE', "%$search%");
            })
            ->paginate(10);

        $ubicaciones = Ubicacion::all();

        return view('admin.direccioncarrera.index', compact('direccionCarreras', 'search', 'ubicaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $direccionCarreras->perPage());
    }

    public function inactivos()
    {
        $direccionCarreras = DireccionCarrera::where('estado', 0)->paginate();
        return view('admin.direccioncarrera.inactivos', compact('direccionCarreras'))
            ->with('i', (request()->input('page', 1) - 1) * $direccionCarreras->perPage());
    }

    public function create()
    {
        return view('direccion-carrera.create');
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'carrera' => 'required|string',
            'descripcion' => 'required|string',
            // Agrega más reglas de validación según tus campos
        ]);

        // Almacenamiento de datos
        DireccionCarrera::create($request->all());

        return redirect()->route('direccion-carrera.index')->with('success', 'Registro creado exitosamente');
    }

    public function update(Request $request, DireccionCarrera $direccionCarrera)
    {
        // Validación de datos
        $request->validate([
            'carrera' => 'required|string',
            'descripcion' => 'required|string',
            // Agrega más reglas de validación según tus campos
        ]);

        // Actualización de datos
        $direccionCarrera->update($request->all());

        return redirect()->route('direccion-carrera.index')->with('success', 'Registro actualizado exitosamente');
    }

    public function cambiarEstado($id)
    {
        $direccionCarrera = DireccionCarrera::find($id);

        if (!$direccionCarrera) {
            return redirect()->route('direccion-carrera.index')->with('error', 'Registro no encontrado');
        }

        // Cambia el estado
        $nuevoEstado = $direccionCarrera->estado == 1 ? 0 : 1;
        $direccionCarrera->estado = $nuevoEstado;
        $direccionCarrera->save();

        if ($nuevoEstado == 1) {
            return redirect()->route('direccion-carrera.index')->with('success', 'Estado del registro cambiado exitosamente');
        } else {
            //return redirect()->route('direccion-carrera.inactivos')->with('success', 'Estado del registro cambiado exitosamente');
            return redirect()->route('direccion-carrera.index')->with('success', 'Estado del registro cambiado exitosamente');
        }
    }
}
