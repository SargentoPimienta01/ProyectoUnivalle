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

        return view('requisitos-naf.index', compact('requisitosNafs'))
            ->with('i', (request()->input('page', 1) - 1) * $requisitosNafs->perPage());
    }*/
    public function index($id_naf)
    {
        $requisitosNafs = RequisitosNaf::where('Id_naf', $id_naf)->paginate();
        $naf = Naf::where('Id_naf', $id_naf)->first();

        return view('requisitos-naf.index', compact('requisitosNafs', 'id_naf', 'naf'))
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
        return view('requisitos-naf.create', compact('requisitosNaf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RequisitosNaf::$rules);

        $requisitosNaf = RequisitosNaf::create($request->all());

        return redirect()->route('requisitos-naf.index')
            ->with('success', 'RequisitosNaf created successfully.');
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

        return view('requisitos-naf.show', compact('requisitosNaf'));
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

        return view('requisitos-naf.edit', compact('requisitosNaf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RequisitosNaf $requisitosNaf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequisitosNaf $requisitosNaf)
    {
        request()->validate(RequisitosNaf::$rules);

        $requisitosNaf->update($request->all());

        return redirect()->route('requisitos-nafs.index')
            ->with('success', 'RequisitosNaf updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $requisitosNaf = RequisitosNaf::find($id)->delete();

        return redirect()->route('requisitos-nafs.index')
            ->with('success', 'RequisitosNaf deleted successfully');
    }
}
