<?php

namespace App\Http\Controllers;

use App\Models\RequisitoCaja;
use Illuminate\Http\Request;

/**
 * Class RequisitoCajaController
 * @package App\Http\Controllers
 */
class RequisitoCajaController extends Controller
{
    public function index($id_caja)
    {
        $requisitoCajas = RequisitoCaja::where('Id_caja', $id_caja)->paginate();
        $requisitoCaja = new RequisitoCaja();

        return view('requisito-caja.index', compact('requisitoCajas', 'requisitoCaja', 'id_caja'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitoCajas->perPage());
    }

    public function create()
    {
        $requisitoCaja = new RequisitoCaja();

        return view('requisito-caja.create', compact('requisitoCaja'));
    }

    public function store(Request $request)
{
    $requisitoCaja = RequisitoCaja::create($request->all());

    return redirect()->route('cajas.requisitos.index', ['id_caja' => $requisitoCaja->Id_caja])
        ->with('success', 'RequisitoCaja created successfully.');
}

    
    public function show($id)
    {
        $requisitoCaja = RequisitoCaja::find($id);

        return view('requisito-caja.show', compact('requisitoCaja'));
    }
    

    public function edit($id)
    {
        $requisitoCaja = RequisitoCaja::find($id);
        $id_caja = $requisitoCaja -> Id_caja;

        return view('requisito-caja.edit', compact('requisitoCaja','id_caja'));
    }

    public function update(Request $request, RequisitoCaja $requisitoCaja)
{
    $requisitoCaja->update($request->all());

    return redirect()->route('cajas.requisitos.index', ['id_caja' => $requisitoCaja->Id_caja])
        ->with('success', 'RequisitoCaja updated successfully');
}


    public function destroy($id)
    {
        $requisitoCaja = RequisitoCaja::find($id);

        if (!$requisitoCaja) {
            return redirect()->route('cajas.requisitos.index')
                ->with('error', 'RequisitoCaja not found');
        }

        $id_caja = $requisitoCaja->Id_caja;

        $requisitoCaja->delete();

        return redirect()->route('cajas.requisitos.index', ['Id_caja' => $id_caja])
            ->with('success', 'RequisitoCaja deleted successfully');
    }

    public function cambiarEstado($id)
{
    $requisitoCaja = RequisitoCaja::find($id);

    if (!$requisitoCaja) {
        return redirect()->route('cajas.requisitos.index')->with('error', 'Requisito de caja no encontrado');
    }

    $id_caja = $requisitoCaja->Id_caja;

    $nuevoEstado = $requisitoCaja->estado == 1 ? 0 : 1;
    $requisitoCaja->estado = $nuevoEstado;
    $requisitoCaja->save();

    if ($nuevoEstado == 1) {
        return redirect()->route('cajas.requisitos.index', ['id_caja' => $id_caja]);
    } else {
        return redirect()->route('cajas.requisitos.index', ['id_caja' => $id_caja])->with('success', 'Estado del requisito de caja cambiado exitosamente');
        //return redirect()->route('cajas.requisitos.inactivos')->with('success', 'Estado del requisito de caja cambiado exitosamente');
    }
}


    public function inactivos()
    {
        $requisitoCaja = RequisitoCaja::where('estado', 0)->paginate();

        return view('cajas.requisitos.inactivos', compact('requisitoCaja'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitoCaja->perPage());
    }

}