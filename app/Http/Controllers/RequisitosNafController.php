<?php

namespace App\Http\Controllers;

use App\Models\RequisitosNaf;
use App\Models\Naf;
use Illuminate\Http\Request;

/**
 * Class RequisitosNafController
 * @package App\Http\Controllers
 */
class RequisitosNafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
        $requisitosNafs = RequisitosNaf::paginate();

        return view('admin.naf.requisitos-naf.index', compact('requisitosNafs'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitosNafs->perPage());
    }*/
    public function index($id_naf)
    {
        $requisitosNafs = RequisitosNaf::where('estado', 1)->where('Id_naf', $id_naf)->paginate(10);
        $naf = Naf::where('Id_naf', $id_naf)->first();

        return view('admin.naf.requisitos-naf.index', compact('requisitosNafs', 'id_naf', 'naf'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitosNafs->perPage());
    }

    public function inactivos()
    {
        $requisitosNafs = RequisitosNaf::where('estado', 0)->paginate(10);
        return view('admin.naf.requisitos-naf.inactivos', compact('requisitosNafs'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitosNafs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requisitosNaf = new RequisitosNaf();
        return view('admin.naf.requisitos-naf.create', compact('requisitosNaf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate your request if needed
        // $request->validate(RequisitosNaf::$rules);

        $requisitosNaf = RequisitosNaf::create($request->all());

        // Assuming Id_naf is part of the request data or you have another way to get it.
        $Id_naf = $request->input('Id_naf');

        return redirect()->back()
            ->with('success', 'Requisito creado exitosamente.');
    }




    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        $requisitosNaf = RequisitosNaf::find($id);

        return view('admin.naf.requisitos-naf.show', compact('requisitosNaf'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisitosNaf = RequisitosNaf::find($id);

        return view('admin.naf.requisitos-naf.edit', compact('requisitosNaf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RequisitosNaf $requisitosNaf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequisitosNaf $naf, $id)
    {
        
        $requisitoNaf = RequisitosNaf::findOrFail($id);

        // Actualiza los campos con los nuevos valores
        $requisitoNaf->update($request->all());

        return redirect()->back()->with('success', 'Requisito actualizado exitosamente.');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $requisitosNaf = RequisitosNaf::find($id)->delete();

        return redirect()->back()
            ->with('success', 'Requisito Naf eliminado exitosamente');
    }

    public function cambiarEstado($id)
    {
        $requisitosNaf = RequisitosNaf::find($id);

        if (!$requisitosNaf) {
            return redirect()->route('requisito-tramites.index')->with('error', 'Requisito de trámite no encontrado');
        }

        // Guarda el ID del trámite antes de cambiar el estado
        $idRequisito = $requisitosNaf->Id_requisito;

        // Cambia el estado
        $nuevoEstado = $requisitosNaf->estado == 1 ? 0 : 1;
        $requisitosNaf->estado = $nuevoEstado;
        $requisitosNaf->save();

        if ($nuevoEstado == 1) {
            // Redirige a requisito-tramites.index con el ID del trámite
            return redirect()->back();
        } else {
            //return redirect()->route('requisito-tramites.inactivos')->with('success', 'Estado del requisito de trámite cambiado exitosamente');
            //return redirect()->route('requisitos-naf.index')->with('success', 'Estado del requisito de trámite cambiado exitosamente');
            return redirect()->back()->with('success', 'Estado del requisito de trámite cambiado exitosamente');
        }
    }
}
