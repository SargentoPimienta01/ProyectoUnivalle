<?php

namespace App\Http\Controllers;

use App\Models\RequisitosGabinetesMedico;
use Illuminate\Http\Request;

/**
 * Class RequisitosGabinetesMedicoController
 * @package App\Http\Controllers
 */
class RequisitosGabinetesMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitosGabinetesMedicos = RequisitosGabinetesMedico::paginate();

        return view('requisitos-gabinetes-medico.index', compact('requisitosGabinetesMedicos'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitosGabinetesMedicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requisitosGabinetesMedico = new RequisitosGabinetesMedico();
        return view('requisitos-gabinetes-medico.create', compact('requisitosGabinetesMedico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate(RequisitosGabinetesMedico::$rules);

        $requisitosGabinetesMedico = RequisitosGabinetesMedico::create($request->all());

        return redirect()->route('requisitos-gabinetesmedico.index')
            ->with('success', 'RequisitosGabinetesMedico created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisitosGabinetesMedico = RequisitosGabinetesMedico::find($id);

        return view('requisitos-gabinetes-medico.show', compact('requisitosGabinetesMedico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisitosGabinetesMedico = RequisitosGabinetesMedico::find($id);

        return view('requisitos-gabinetes-medico.edit', compact('requisitosGabinetesMedico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RequisitosGabinetesMedico $requisitosGabinetesMedico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequisitosGabinetesMedico $requisitosGabinetesMedico)
    {
        //request()->validate(RequisitosGabinetesMedico::$rules);

        $requisitosGabinetesMedico->update($request->all());

        return redirect()->route('requisitos-gabinetemedico.index')
            ->with('success', 'RequisitosGabinetesMedico updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $requisitosGabinetesMedico = RequisitosGabinetesMedico::find($id)->delete();

        return redirect()->route('requisitos-gabinetemedico.index')
            ->with('success', 'RequisitosGabinetesMedico deleted successfully');
    }
}
