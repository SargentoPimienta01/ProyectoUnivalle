<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicioDireccion;
use App\Models\DireccionCarrera;

class ServicioDireccionController extends Controller
{
    public function index($direccion_carrera_id)
    {
        // Obtén solo los servicios de dirección relacionados con la dirección de carrera y con estado 1
        $serviciosDireccion = ServicioDireccion::where('direccion_carrera_id', $direccion_carrera_id)
            ->where('estado', 1)
            ->paginate();

        $servicioDireccion = new ServicioDireccion();

        $direccionCarrera = DireccionCarrera::find($direccion_carrera_id);

        return view('admin.direccioncarrera.servicios.index', compact('serviciosDireccion', 'servicioDireccion', 'direccion_carrera_id', 'direccionCarrera'))
            ->with('i', (request()->input('page', 1) - 1) * $serviciosDireccion->perPage());
    }

    public function inactivos()
    {
        // Obtén todos los servicios de dirección inactivos paginados
        $serviciosInactivos = ServicioDireccion::where('estado', 0)->paginate();

        // Puedes pasar los servicios inactivos paginados a la vista correspondiente
        return view('admin.direccioncarrera.servicios.inactivos', compact('serviciosInactivos'));
    }

    public function create($direccion_carrera_id)
    {
        $servicioDireccion = new ServicioDireccion();
        return view('admin.direccioncarrera.servicios.create', compact('servicioDireccion', 'direccion_carrera_id'));
    }

    public function store(Request $request, $direccion_carrera_id)
    {
        // Validación y creación del servicio de dirección
        $servicioDireccion = new ServicioDireccion([
            'Titulo' => $request->Titulo,
            'Image' => $request->Image,
            'Requisitos' => $request->Requisitos,
            'estado' => $request->estado,
            'direccion_carrera_id' => $direccion_carrera_id,  // Corregir el nombre de la columna
        ]);

        $servicioDireccion->save();

        // Redirigir al índice de servicios de dirección
        return redirect()->route('servicio-direccion.index', ['direccion_carrera_id' => $direccion_carrera_id])
            ->with('success', 'Servicio de Dirección creado exitosamente.');
    }


    public function edit($direccion_carrera_id, $id)
    {
        // Recupera el servicio de dirección que se va a editar
        $servicioDireccion = ServicioDireccion::find($id);

        // Puedes necesitar más lógica aquí según tus requerimientos

        // Retorna la vista de edición con el servicio de dirección
        return view('admin.direccioncarrera.servicios.edit', compact('servicioDireccion', 'id', 'direccion_carrera_id'));
    }

    public function update(Request $request, $direccion_carrera_id, $id)
    {
        // Encuentra el servicio de dirección a actualizar
        $servicioDireccion = ServicioDireccion::findOrFail($id);

        // Actualiza los campos con los nuevos valores
        $servicioDireccion->update($request->all());

        // Redirige al índice de servicios de dirección
        return redirect()->route('servicio-direccion.index', ['direccion_carrera_id' => $direccion_carrera_id])
            ->with('success', 'Servicio de Dirección actualizado exitosamente.');
    }

    public function cambiarEstado($direccion_carrera_id, $id)
    {
        // Encuentra el servicio de dirección por su ID
        $servicioDireccion = ServicioDireccion::findOrFail($id);

        // Guarda el direccion_carrera_id antes de cambiar el estado
        $direccion_carrera_id = $servicioDireccion->direccion_carrera_id;

        // Cambia el estado
        $servicioDireccion->estado = $servicioDireccion->estado == 1 ? 0 : 1;
        $servicioDireccion->save();

        // Redirige a diferentes vistas según el estado cambiado
        if ($servicioDireccion->estado == 0) {
            // Si el estado es 0, redirige a la vista de inactivos
            return redirect()->route('servicio-direccion.inactivos', ['direccion_carrera_id' => $direccion_carrera_id])
                ->with('success', 'Estado cambiado exitosamente.');
        } else {
            // Si el estado es 1, redirige a la vista de servicios activos
            return redirect()->route('servicio-direccion.index', ['direccion_carrera_id' => $direccion_carrera_id])
                ->with('success', 'Estado cambiado exitosamente.');
        }
    }

}
