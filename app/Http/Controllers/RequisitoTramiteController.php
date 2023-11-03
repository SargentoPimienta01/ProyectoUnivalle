<?php

namespace App\Http\Controllers;

use App\Models\RequisitoTramite;
use App\Models\Tramite;
use Illuminate\Http\Request;

/**
 * Class RequisitoTramiteController
 * @package App\Http\Controllers
 */
class RequisitoTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
        $requisitoTramites = RequisitoTramite::paginate();

        return view('requisito-tramite.index', compact('requisitoTramites'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitoTramites->perPage());
    }*/
    public function index($id_tramite)
    {
        $requisitoTramites = RequisitoTramite::where('Id_tramite', $id_tramite)->paginate();
        $requisitoTramite = new RequisitoTramite();
        $tramite = Tramite::where('Id_tramite', $id_tramite)->first();

        return view('requisito-tramite.index', compact('requisitoTramites', 'requisitoTramite', 'id_tramite', 'tramite'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitoTramites->perPage());
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requisitoTramite = new RequisitoTramite();
        return view('requisito-tramite.create', compact('requisitoTramite'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación y creación del requisito de trámite

        $requisitoTramite = RequisitoTramite::create($request->all());

        // Redirigir al detalle del requisito de trámite recién creado
        return redirect()->route('requisito-tramites.show', ['requisito_tramite' => $requisitoTramite->Id_tramite])
            ->with('success', 'RequisitoTramite created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        $requisitoTramite = RequisitoTramite::find($id);

        return view('requisito-tramite.show', compact('requisitoTramite'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisitoTramite = RequisitoTramite::find($id);

        return view('requisito-tramite.edit', compact('requisitoTramite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RequisitoTramite $requisitoTramite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequisitoTramite $requisitoTramite)
    {
        // Validación y actualización del requisito de trámite

        $requisitoTramite->update($request->all());

        // Redirigir al índice de requisitos de trámite
        return redirect()->route('requisito-tramites.show', $requisitoTramite->Id_tramite)
    ->with('success', 'RequisitoTramite updated successfully');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    
     public function destroy($id)
     {
         $requisitoTramite = RequisitoTramite::find($id);
     
         if (!$requisitoTramite) {
             return redirect()->route('requisito-tramites.index')
                 ->with('error', 'RequisitoTramite not found');
         }
     
         // Guarda el Id_tramite antes de eliminar el requisito
         $id_tramite = $requisitoTramite->Id_tramite;
     
         $requisitoTramite->delete();
     
         return redirect()->route('requisito-tramites.show', ['requisito_tramite' => $id_tramite])
             ->with('success', 'RequisitoTramite deleted successfully');
     }

    public function inactivos()
    {
        $requisitosInactivos = RequisitoTramite::where('estado', 0)->paginate();
        return view('requisito-tramite.inactivos', compact('requisitosInactivos'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitosInactivos->perPage());
    }

    public function cambiarEstado($id)
{
    $requisitoTramite = RequisitoTramite::find($id);

    if (!$requisitoTramite) {
        return redirect()->route('requisito-tramites.index')->with('error', 'Requisito de trámite no encontrado');
    }

    // Guarda el ID del trámite antes de cambiar el estado
    $idTramite = $requisitoTramite->Id_tramite;

    // Cambia el estado
    $nuevoEstado = $requisitoTramite->estado == 1 ? 0 : 1;
    $requisitoTramite->estado = $nuevoEstado;
    $requisitoTramite->save();

    if ($nuevoEstado == 1) {
        // Redirige a requisito-tramites.index con el ID del trámite
        return redirect()->route('requisito-tramites.show', ['requisito_tramite' => $requisitoTramite->Id_tramite]);
    } else {
        return redirect()->route('requisito-tramites.inactivos')->with('success', 'Estado del requisito de trámite cambiado exitosamente');
    }
}

     
}
