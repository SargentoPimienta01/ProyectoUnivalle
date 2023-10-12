<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\CategoriaTramites;
use App\Models\Tramite;
use App\Models\RequisitoTramite;
use App\Models\Caja;
use App\Models\RequisitoCaja;

class HomeController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('home', ['areas' => $areas]);
    }

    public function tramites()
    {
        $ctramites = CategoriaTramites::all();
        return view('home.tramites.ctramites', ['ctramites' => $ctramites]);
    }

    public function tramitesdisponibles(Request $request)
    {
        // Obtiene el id_categoria_tramites desde la solicitud POST
        $idCategoriaTramites = $request->input('id_categoria_tramites');

        // Obtén la categoría de trámites correspondiente
        $ctramite = CategoriaTramites::find($idCategoriaTramites);

        // Obtén los trámites que pertenecen a esa categoría
        $tramites = Tramite::where('id_categoria_tramites', $idCategoriaTramites)->get();

        return view('home.tramites.tramites', ['ctramite' => $ctramite, 'tramites' => $tramites]);
    }

    public function requisitos(Request $request)
    {
        // Obtén el id_tramite y el nombre_tramite desde la solicitud POST
        $idTramite = $request->input('id_tramite');
        $nombreTramite = $request->input('nombre_tramite');
        $duracionTramite = $request->input('duracion_tramite');

        // Obtén los requisitos del trámite especificado por id_tramite
        $requisitos = RequisitoTramite::where('Id_tramite', $idTramite)->get();

        return view('home.tramites.requisitos', ['nombreTramite' => $nombreTramite, 'duracionTramite' => $duracionTramite, 'requisitos' => $requisitos]);
    }

    public function cajas()
    {
        $cajas = Caja::all();
        return view('home.cajas.cajas', ['cajas' => $cajas]);
    }

    public function requisitosCaja(Request $request)
    {
        // Obtén el ID de la caja desde la solicitud POST
        $idCaja = $request->input('id_caja');

        // Obtén la información de la caja correspondiente al requisito
        $requisitoCaja = Caja::find($idCaja);

        // Obtén los requisitos de la caja
        $requisitos = RequisitoCaja::where('Id_caja', $idCaja)->get();

        return view('home.cajas.requisitos', ['requisitoCaja' => $requisitoCaja, 'requisitos' => $requisitos]);
    }

    public function plataformadeatencion ()
    {
        return view ('home.plataforma-de-atencion.index');
    }

    public function paservicios ()
    {
        return view ('home.plataforma-de-atencion.servicios');
    }

    public function gabinetemedico ()
    {
        return view ('home.gabinete-medico.index');
    }

    public function naf ()
    {
        return view ('home.naf.index');
    }
}
