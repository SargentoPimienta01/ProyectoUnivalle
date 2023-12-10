<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Area;
use Illuminate\Http\Request;

/**
 * Clase ContactoController
 * @package App\Http\Controllers
 */
class ContactoController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contacto::where('estado', 1)->paginate(10);

        return view('admin.contacto.index', compact('contactos'))
            ->with('i', (request()->input('page', 1) - 1) * $contactos->perPage());
    }


    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacto = new Contacto();
        $areas = Area::where('estado',1)->paginate(10);
        return view('admin.contacto.create', compact('contacto', 'areas'));
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        request()->validate(Contacto::$rules);

        // Verificar si ya existe un contacto con el mismo Id_area
        $existingContacto = Contacto::where('Id_area', $request->input('Id_area'))->first();

        // Si existe, redirigir con un mensaje de error
        if ($existingContacto) {
            $areaConContacto = Area::find($request->input('Id_area'));

            return redirect()->route('contactos.index')
                ->with('error', 'Ya existe un contacto responsable del área de ' . $areaConContacto->nombre_area);
        }

        // Si no existe, crear el nuevo contacto
        $contacto = Contacto::create($request->all());

        return redirect()->route('contactos.index')
            ->with('success', 'Contacto creado exitosamente.');
    }



    /**
     * Muestra el recurso especificado.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacto = Contacto::find($id);

        return view('admin.contacto.show', compact('contacto'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contacto::find($id);
        $areas = Area::where('estado',1)->paginate(10);

        return view('admin.contacto.edit', compact('contacto', 'areas'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contacto $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        // Validar los datos del formulario
        request()->validate(Contacto::$rules);

        // Verificar si ya existe otro contacto con el mismo Id_area
        $existingContacto = Contacto::where('Id_area', $request->input('Id_area'))
            ->where('id', '<>', $contacto->id) // Excluir el propio contacto actual de la verificación
            ->first();

        // Si existe, redirigir con un mensaje de error
        if ($existingContacto) {
            $areaConContacto = Area::find($request->input('Id_area'));

            return redirect()->route('contactos.index')
                ->with('error', 'Ya existe un contacto responsable de esta área: ' . $areaConContacto->nombre_area);
        }

        // Si no existe, actualizar el contacto
        $contacto->update($request->all());

        return redirect()->route('contactos.index')
            ->with('success', 'Contacto actualizado exitosamente');
    }



    /**
     * Elimina el recurso especificado.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contacto = Contacto::find($id)->delete();

        return redirect()->route('contactos.index')
            ->with('success', 'Contacto eliminado exitosamente');
    }

    public function inactivos()
    {
        $contactos = Contacto::where('estado', 0)->paginate(10);

        return view('admin.contacto.inactivos', compact('contactos'))
            ->with('i', (request()->input('page', 1) - 1) * $contactos->perPage());
    }


    public function cambiarEstado($id)
    {
        $contacto = Contacto::find($id);

        if (!$contacto) {
            return redirect()->route('contactos.index')->with('error', 'Contacto no encontrado');
        }

        // Cambia el estado
        $nuevoEstado = $contacto->estado == 1 ? 0 : 1;
        $contacto->estado = $nuevoEstado;
        $contacto->save();

        /*if ($nuevoEstado == 1) {
            return redirect()->route('contactos.index')->with('success', 'Estado del contacto cambiado exitosamente');
        } else {
            return redirect()->route('contactos.inactivos')->with('success', 'Estado del contacto cambiado exitosamente');
        }*/
        if ($nuevoEstado == 1) {
            return redirect()->route('contactos.index')->with('success', 'Contacto activado exitosamente');
        } else {
            return redirect()->route('contactos.index')->with('success', 'Contacto eliminado exitosamente');
        }
    }

}
