<?php

namespace App\Http\Controllers;

use App\Models\GabinetesMedico;
use Illuminate\Http\Request;

/**
 * Class GabinetesMedicoController
 * @package App\Http\Controllers
 */
class GabinetesMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gabinetesMedicos = GabinetesMedico::paginate();

        return view('gabinetes-medico.index', compact('gabinetesMedicos'))
            ->with('i', (request()->input('page', 1) - 1) * $gabinetesMedicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gabinetesMedico = new GabinetesMedico();
        return view('gabinetes-medico.create', compact('gabinetesMedico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(GabinetesMedico::$rules);

        $gabinetesMedico = GabinetesMedico::create($request->all());

        return redirect()->route('gabinetes-medico.index')
            ->with('success', 'GabinetesMedico created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gabinetesMedico = GabinetesMedico::find($id);

        return view('gabinetes-medico.show', compact('gabinetesMedico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gabinetesMedico = GabinetesMedico::find($id);

        return view('gabinetes-medico.edit', compact('gabinetesMedico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  GabinetesMedico $gabinetesMedico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GabinetesMedico $gabinetesMedico)
    {
        request()->validate(GabinetesMedico::$rules);

        $gabinetesMedico->update($request->all());

        return redirect()->route('gabinetes-medico.index')
            ->with('success', 'GabinetesMedico updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $gabinetesMedico = GabinetesMedico::find($id)->delete();

        return redirect()->route('gabinetes-medico.index')
            ->with('success', 'GabinetesMedico deleted successfully');
    }
}
