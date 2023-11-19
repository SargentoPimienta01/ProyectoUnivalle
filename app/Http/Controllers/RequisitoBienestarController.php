<?php

namespace App\Http\Controllers;

use App\Models\RequisitoBienestar;
use App\Models\BienestarUniversitario;
use Illuminate\Http\Request;

class RequisitoBienestarController extends Controller
{
    public function index($id_bienestar)
    {
        // Obtén solo los requisitos de bienestar con estado 1
        $requisitosBienestar = RequisitoBienestar::where('Id_bienestar', $id_bienestar)
            ->where('estado', 1)
            ->paginate();

        $requisitoBienestar = new RequisitoBienestar();
        $bienestar = BienestarUniversitario::find($id_bienestar);

        return view('admin.bienestar.requisito-bienestar.index', compact('requisitosBienestar', 'requisitoBienestar', 'id_bienestar', 'bienestar'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitosBienestar->perPage());
    }


    public function inactivos()
    {
        // Obtén todos los requisitos de bienestar inactivos paginados
        $requisitosInactivos = RequisitoBienestar::where('estado', 0)->paginate();

        // Puedes pasar los requisitos inactivos paginados a la vista correspondiente
        return view('admin.bienestar.requisito-bienestar.inactivos', compact('requisitosInactivos'));
    }


    public function create($id_bienestar)
    {
        $requisitoBienestar = new RequisitoBienestar();
        return view('admin.bienestar.requisito-bienestar.create', compact('requisitoBienestar', 'id_bienestar'));
    }


    public function store(Request $request, $id_bienestar)
    {
        // Validación y creación del requisito de bienestar
        $requisitoBienestar = new RequisitoBienestar([
            'servicio' => $request->servicio,
            'detalle' => $request->detalle,
            'requisitos' => $request->requisitos,
            'horarios' => $request->horarios,
            'estado' => $request->estado,
            'Id_bienestar' => $id_bienestar,
        ]);

        $requisitoBienestar->save();

        // Redirigir al índice de requisitos de bienestar
        return redirect()->route('requisito-bienestares.index', ['id_bienestar' => $id_bienestar])
            ->with('success', 'RequisitoBienestar creado exitosamente.');
    }


    public function edit($id_bienestar, $id)
    {
        // Recupera el requisito de bienestar que se va a editar
        $requisitoBienestar = RequisitoBienestar::find($id);

        // Puedes necesitar más lógica aquí según tus requerimientos

        // Retorna la vista de edición con el requisito de bienestar
        return view('admin.bienestar.requisito-bienestar.edit', compact('requisitoBienestar', 'id_bienestar', 'id'));
    }


    public function update(Request $request, $id_bienestar, $id)
    {
        // Encuentra el requisito de bienestar a actualizar
        $requisitoBienestar = RequisitoBienestar::findOrFail($id);

        // Actualiza los campos con los nuevos valores
        $requisitoBienestar->update($request->all());

        // Redirige al índice de requisitos de bienestar
        return redirect()->route('requisito-bienestares.index', ['id_bienestar' => $id_bienestar])
            ->with('success', 'Requisito de Bienestar actualizado exitosamente.');
    }

    public function cambiarEstado($id)
{
    // Encuentra el requisito de bienestar por su ID
    $requisitoBienestar = RequisitoBienestar::findOrFail($id);

    // Guarda el id_bienestar antes de cambiar el estado
    $id_bienestar = $requisitoBienestar->Id_bienestar;

    // Cambia el estado
    $requisitoBienestar->estado = $requisitoBienestar->estado == 1 ? 0 : 1;
    $requisitoBienestar->save();

    // Redirige a diferentes vistas según el estado cambiado
    if ($requisitoBienestar->estado == 0) {
        // Si el estado es 0, redirige a la vista de inactivos
        return redirect()->route('requisito-bienestares.inactivos')
            ->with('success', 'Estado cambiado exitosamente.');
    } else {
        // Si el estado es 1, redirige a la vista de requisitos activos
        return redirect()->route('requisito-bienestares.index', ['id_bienestar' => $id_bienestar])
            ->with('success', 'Estado cambiado exitosamente.');
    }
}



}
