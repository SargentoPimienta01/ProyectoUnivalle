<?php

namespace App\Http\Controllers;

use App\Models\Postgrado;
use Illuminate\Http\Request;

/**
 * Class PostgradoController
 * @package App\Http\Controllers
 */
class PostgradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postgrados = Postgrado::paginate();

        return view('admin.postgrado.index', compact('postgrados'))
            ->with('i', (request()->input('page', 1) - 1) * $postgrados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postgrado = new Postgrado();
        return view('admin.postgrado.create', compact('postgrado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Postgrado::$rules);

        $postgrado = Postgrado::create($request->all());

        return redirect()->route('postgrados.index')
            ->with('success', 'Postgrado agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postgrado = Postgrado::find($id);

        return view('admin.postgrado.show', compact('postgrado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postgrado = Postgrado::where('Id_postgrado', $id)->first();

        if (!$postgrado) {
            // Manejar el caso en que no se encuentra el postgrado con el ID dado
            abort(404);
        }

        return view('admin.postgrado.edit', compact('postgrado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Postgrado $postgrado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postgrado $postgrado)
    {
        request()->validate(Postgrado::$rules);

        $postgrado->update($request->all());

        return redirect()->route('postgrados.index')
            ->with('success', 'Postgrado actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $postgrado = Postgrado::find($id)->delete();

        return redirect()->route('postgrados.index')
            ->with('success', 'Postgrado deleted successfully');
    }
}
