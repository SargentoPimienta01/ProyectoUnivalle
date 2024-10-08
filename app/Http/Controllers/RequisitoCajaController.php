<?php

namespace App\Http\Controllers;

use App\Models\RequisitoCaja;
use App\Models\Caja;
use Illuminate\Http\Request;

/**
 * Class RequisitoCajaController
 * @package App\Http\Controllers
 */
class RequisitoCajaController extends Controller
{
    public function index($id_caja)
    {
        $requisitoCajas = RequisitoCaja::where('Id_caja', $id_caja)->where('estado',1)->paginate(10);
        $requisitoCaja = new RequisitoCaja();
        $caja = Caja::where('Id_caja', $id_caja)->first();

        return view('admin.caja.requisito-caja.index', compact('requisitoCajas', 'requisitoCaja', 'id_caja','caja'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitoCajas->perPage());
    }

    public function inactivos()
    {
        $requisitoCajas = RequisitoCaja::where('estado', 0)->paginate(10);

        return view('admin.caja.requisito-caja.inactivos', compact('requisitoCajas'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitoCajas->perPage());
    }

    public function create()
    {
        $requisitoCaja = new RequisitoCaja();

        return view('admin.caja.requisito-caja.create', compact('requisitoCaja'));
    }

    public function store(Request $request)
    {
        request()->validate(RequisitoCaja::$rules);

        $requisitoCaja = RequisitoCaja::create($request->all());

        return redirect()->route('cajas.requisitos.index', ['id_caja' => $requisitoCaja->Id_caja])
            ->with('success', 'Requisito de caja creado exitosamente.');
    }

    
    public function show($id)
    {
        $requisitoCaja = RequisitoCaja::find($id);

        return view('admin.caja.requisito-caja.show', compact('requisitoCaja'));
    }
    

    public function edit($id)
    {
        $requisitoCaja = RequisitoCaja::find($id);
        $id_caja = $requisitoCaja -> Id_caja;

        return view('admin.caja.requisito-caja.edit', compact('requisitoCaja','id_caja'));
    }

    public function update(Request $request, RequisitoCaja $requisitoCaja)
    {
        request()->validate(RequisitoCaja::$rules);

        $requisitoCaja->update($request->all());

        return redirect()->route('cajas.requisitos.index', ['id_caja' => $requisitoCaja->Id_caja])
            ->with('success', 'Requisito de caja actualizado exitosamente');
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
            ->with('success', 'Requisito de caja exliminado exitosamente');
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

}