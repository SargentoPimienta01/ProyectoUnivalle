<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;

/**
 * Class CampusController
 * @package App\Http\Controllers
 */
class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = Campus::where('estado',1)->paginate(10);

        return view('admin.campus.index', compact('campuses'))
            ->with('i', (request()->input('page', 1) - 1) * $campuses->perPage());
    }

    public function inactivos()
    {
        $campuses = Campus::where('estado',0)->paginate(10);

        return view('admin.campus.inactivos', compact('campuses'))
            ->with('i', (request()->input('page', 1) - 1) * $campuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campus = new Campus();
        return view('admin.campus.create', compact('campus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Campus::$rules);

        $campus = Campus::create($request->all());

        return redirect()->route('campuses.index')
            ->with('success', 'Campus created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campus = Campus::find($id);

        return view('admin.campus.show', compact('campus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campus = Campus::find($id);

        return view('admin.campus.edit', compact('campus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Campus $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        request()->validate(Campus::$rules);

        $campus->update($request->all());

        return redirect()->route('campuses.index')
            ->with('success', 'Campus updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $campus = Campus::find($id)->delete();

        return redirect()->route('campuses.index')
            ->with('success', 'Campus deleted successfully');
    }

    public function cambiarEstado($id)
    {
        $campus = Campus::find($id);

        if (!$campus) {
            return redirect()->route('campuses.index')->with('error', 'Campus no encontrado');
        }

        // Cambia el estado
        $nuevoEstado = $campus->estado == 1 ? 0 : 1;
        $campus->estado = $nuevoEstado;
        $campus->save();

        if ($nuevoEstado == 1) {
            return redirect()->route('campuses.index')->with('success', 'Estado del campus cambiado exitosamente');
        } else {
            //return redirect()->route('campuses.inactivos')->with('success', 'Estado del campus cambiado exitosamente');
            return redirect()->route('campuses.index')->with('success', 'Estado del campus cambiado exitosamente');
        }
    }

}
