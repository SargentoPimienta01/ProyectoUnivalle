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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitoCajas = RequisitoCaja::paginate();

        return view('requisito-caja.index', compact('requisitoCajas'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitoCajas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requisitoCaja = new RequisitoCaja();
        return view('requisito-caja.create', compact('requisitoCaja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate(RequisitoCaja::$rules);

        $requisitoCaja = RequisitoCaja::create($request->all());

        return redirect()->route('requisito-cajas.index')
            ->with('success', 'RequisitoCaja created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisitoCaja = RequisitoCaja::find($id);

        return view('requisito-caja.show', compact('requisitoCaja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisitoCaja = RequisitoCaja::find($id);

        return view('requisito-caja.edit', compact('requisitoCaja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RequisitoCaja $requisitoCaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequisitoCaja $requisitoCaja)
    {
        //request()->validate(RequisitoCaja::$rules);

        $requisitoCaja->update($request->all());

        return redirect()->route('requisito-cajas.index')
            ->with('success', 'RequisitoCaja updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $requisitoCaja = RequisitoCaja::find($id)->delete();

        return redirect()->route('requisito-cajas.index')
            ->with('success', 'RequisitoCaja deleted successfully');
    }
}
