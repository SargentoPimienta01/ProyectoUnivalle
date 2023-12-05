<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
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
        $contactos = Contacto::paginate();

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
        return view('admin.contacto.create', compact('contacto'));
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Contacto::$rules);

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

        return view('admin.contacto.edit', compact('contacto'));
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
        request()->validate(Contacto::$rules);

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
}
