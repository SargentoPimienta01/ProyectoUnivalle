<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class AreaController
 * @package App\Http\Controllers
 */
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:area-list|area-create|area-edit|area-delete', ['only' => ['index','show']]);
        $this->middleware('permission:area-create', ['only' => ['create','store']]);
        $this->middleware('permission:area-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:area-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::paginate();
        $area = new Area();
        return view('admin.area.index', compact('areas', 'area'))
            ->with('i', (request()->input('page', 1) - 1) * $areas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = new Area();
        return view('admin.area.create', compact('area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate(Area::$rules);

        $area = Area::create($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'Area created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::where('Id_area', $id)->first();

        return view('admin.area.show', compact('area'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);

        return view('admin.area.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Area $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        //request()->validate(Area::$rules);

        $area->update($request->all());

        return redirect()->route('admin.areas.index')
            ->with('success', 'Area updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $area = Area::find($id)->delete();

        return redirect()->route('admin.areas.index')
            ->with('success', 'Area deleted successfully');
    }

    public function cambiarEstado(Request $request, $id)
    {
        $area = Area::find($id);

        if (!$area) {
            return redirect()->route('areas.index')->with('error', 'Área no encontrada');
        }

        // Cambia el estado
        $nuevoEstado = $area->estado == 1 ? 0 : 1;
        $area->estado = $nuevoEstado;
        $area->save();

        if ($nuevoEstado == 1) {
            return redirect()->route('areas.index')->with('success', 'Área desactivada exitosamente');
        } else {
            return redirect()->route('areas.index')->with('success', 'Área activada exitosamente');
        }
    }

}
