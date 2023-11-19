<?php

namespace App\Http\Controllers;

use App\Models\BienestarUniversitario;
use Illuminate\Http\Request;

class BienestarUniversitarioController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Consulta de Bienestar Universitario con búsqueda
        $bienestarUniversitario = BienestarUniversitario::where('estado', 1)
            ->where(function ($query) use ($search) {
                $query->where('servicio', 'LIKE', "%$search%")
                    ->orWhere('detalle', 'LIKE', "%$search%")
                    ->orWhere('Id_area', 'LIKE', "%$search%");
            })
            ->paginate();

        return view('admin.bienestar.index', compact('bienestarUniversitario', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $bienestarUniversitario->perPage());
    }

    public function inactivos()
    {
        $bienestarUniversitario = BienestarUniversitario::where('estado', 0)->paginate();
        return view('admin.bienestar.inactivos', compact('bienestarUniversitario'))
            ->with('i', (request()->input('page', 1) - 1) * $bienestarUniversitario->perPage());;
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'servicio' => 'required|string|max:255',
            'detalle' => 'required|string|max:255',
            'Id_area' => 'required|integer',
            // Agrega más reglas de validación según tus campos
        ]);

        // Almacenamiento de datos
        BienestarUniversitario::create($request->all());

        return redirect()->route('bienestar.index')->with('success', 'Registro creado exitosamente');
    }

    public function update(Request $request, BienestarUniversitario $bienestar)
    {
        // Validación de datos
        $request->validate([
            'servicio' => 'required|string|max:255',
            'detalle' => 'required|string|max:255',
            'Id_area' => 'required|integer',
            // Agrega más reglas de validación según tus campos
        ]);

        // Actualización de datos
        $bienestar->update($request->all());

        return redirect()->route('bienestar.index')->with('success', 'Registro actualizado exitosamente');
    }

    public function cambiarEstado($id)
    {
        $bienestar = BienestarUniversitario::find($id);

        if (!$bienestar) {
            return redirect()->route('bienestar.index')->with('error', 'Registro no encontrado');
        }

        // Cambia el estado
        $nuevoEstado = $bienestar->estado == 1 ? 0 : 1;
        $bienestar->estado = $nuevoEstado;
        $bienestar->save();

        if ($nuevoEstado == 1) {
            return redirect()->route('bienestar.index')->with('success', 'Estado del registro cambiado exitosamente');
        } else {
            return redirect()->route('bienestar.inactivos')->with('success', 'Estado del registro cambiado exitosamente');
        }
    }
}

