<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\CategoriaTramites;
use App\Models\Tramite;
use App\Models\RequisitoTramite;

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



}
