<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use App\Models\CategoriaTramites;
use App\Models\Tramite;
use App\Models\RequisitoTramite;

class PdfController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'Mi PDF de ejemplo',
            'content' => 'Contenido del PDF...',
        ];

        $pdf = PDF::loadView('pdf.example', $data);

        //return $pdf->download('ejemplo.pdf');

        return $pdf->stream('ejemplo.pdf');
    }

    public function generateRequisitosPdf($id_categoria_tramites, $nombre_categoria, $id_tramite, $nombre_tramite = null)
    {
        // Obtén la duración del trámite
        $duracionTramite = Tramite::where('id_categoria_tramites', $id_categoria_tramites)
            ->where('id_tramite', $id_tramite)
            ->value('duracion_tramite');

        $tituloTramite = Tramite::where('id_categoria_tramites', $id_categoria_tramites)
            ->where('id_tramite', $id_tramite)
            ->value('nombre_tramite');

        // Obtén los requisitos del trámite especificado por id_tramite con estado igual a 1
        $requisitos = RequisitoTramite::where('Id_tramite', $id_tramite)
            ->where('estado', 1)
            ->get();

        // Obtén la ubicación del trámite
        $ubicacionTramite = Tramite::find($id_tramite)->ubicacion;

        $data = [
            'nombreCategoria' => $nombre_categoria,
            'idCategoriaTramites' => $id_categoria_tramites,
            'idTramite' => $id_tramite,
            'nombreTramite' => $nombre_tramite,
            'duracionTramite' => $duracionTramite,
            'tituloTramite' => $tituloTramite,
            'requisitos' => $requisitos,
            'ubicacionTramite' => $ubicacionTramite
        ];

        $pdf = PDF::loadView('home.tramites.pdf.requisitos', $data);

        // Puedes ajustar el nombre del archivo PDF según tus necesidades
        $filename = 'requisitos_' . $id_tramite . '.pdf';

        return $pdf->stream($filename);
    }

}
