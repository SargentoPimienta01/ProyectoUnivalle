<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use App\Models\CategoriaTramites;
use App\Models\Tramite;
use App\Models\RequisitoTramite;
use App\Models\Caja;
use App\Models\RequisitoCaja;
use App\Models\BienestarUniversitario;
use App\Models\RequisitoBienestar;
use App\Models\DireccionCarrera;
use App\Models\ServicioDireccion;
use App\Models\Campus;
use App\Models\postgrado;
use App\Models\PlataformaDeAtencion;
use App\Models\Biblioteca;
use App\Models\producto;
use App\Models\CategoriaMenu;
use App\Models\Naf;
use App\Models\RequisitosNaf;

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

    public function requisitosCajaPdf($idCaja, $nombre = null)
    {
        // Obtén la información de la caja correspondiente al requisito
        $requisitoCaja = Caja::find($idCaja);
    
        // Obtén los requisitos de la caja con estado 1
        $requisitos = RequisitoCaja::where('Id_caja', $idCaja)
            ->where('estado', 1)
            ->get();
    
        $data = [
            'requisitoCaja' => $requisitoCaja,
            'requisitos' => $requisitos,
            'nombre' => $nombre,
        ];

        $pdf = PDF::loadView('home.cajas.pdf.requisitos', $data);

        $filename = 'requisitos'. $idCaja .'.pdf';

        return $pdf->stream($filename);
    }

    public function nafPdf ()
    {
        $nafs = Naf::where('estado', 1)->get();
        $requisitosNaf = RequisitosNaf::where('estado', 1)->get();
        $data = ['nafs' => $nafs, 'requisitosNaf'=> $requisitosNaf];
        $pdf = PDF::loadView('home.naf.pdf.index', $data);
        $filename = 'nafs'.time().'.pdf';
        return $pdf->stream($filename);
    }

    public function requisitosBienestaruPdf($idBienestar, $servicio = null)
    {
        $servicioBienestar = BienestarUniversitario::find($idBienestar);
    
        $servicios = RequisitoBienestar::where('Id_bienestar', $idBienestar)
            ->where('estado', 1)
            ->get();
        
        // Verificar si se encontró el BienestarUniversitario
        if ($servicioBienestar) {
            // Acceder a la relación 'ubicacion' para obtener la ubicación asociada
            $ubicacion = $servicioBienestar->ubicacion;
        } else {
            // Manejar el caso en el que no se encuentre el BienestarUniversitario
            $ubicacion = null;
        }
    
        $data = [
            'servicioBienestar' => $servicioBienestar,
            'servicios' => $servicios,
            'servicio' => $servicio,
            'ubicacion' => $ubicacion,
        ];

        $pdf = PDF::loadView('home.bienestar.pdf.servicios', $data);
        $filename = 'bienestar'.time().'.pdf';
        return $pdf->stream($filename);
    }

    public function serviciosDireccionPdf($idDireccion, $servicio = null)
    {
        $servicioDireccion = DireccionCarrera::find($idDireccion);
    
        //$servicios = $servicioDireccion->servicios()->where('estado', 1)->get();

        $servicios = ServicioDireccion::where('direccion_carrera_id', $idDireccion)
            ->where('estado', 1)
            ->get();

        // Verificar si se encontró el BienestarUniversitario
        if ($servicioDireccion) {
            // Acceder a la relación 'ubicacion' para obtener la ubicación asociada
            $ubicacion = $servicioDireccion->ubicacion;
        } else {
            // Manejar el caso en el que no se encuentre el BienestarUniversitario
            $ubicacion = null;
        }
    
        $data = [
            'servicioDireccion' => $servicioDireccion,
            'servicios' => $servicios,
            'servicio' => $servicio,
            'ubicacion' => $ubicacion,
        ];

        $pdf = PDF::loadView('home.direccioncarrera.pdf.servicio', $data);
        $filename = 'direccion_carrera'.time().'.pdf';
        return $pdf->stream($filename);
    }

    public function postgradoDiplomadoPdf()
    {
        $posgrados = postgrado::where('categoria', 'diplomado')->where('estado', 1)->get();
        $categoria = 'Diplomado';
        $data = ['posgrados'=>$posgrados, 'categoria'=>$categoria,];
        $pdf = PDF::loadView('home.posgrado.pdf.index', $data);
        $filename = 'diplomado'.time().'.pdf';
        return $pdf->stream($filename);
    }
    public function postgradoDoctoradoPdf ()
    {
        $posgrados = postgrado::where('categoria', 'maestria')->where('estado', 1)->get();
        $categoria = 'Doctorado';
        $data = ['posgrados'=>$posgrados, 'categoria'=>$categoria,];
        $pdf = PDF::loadView('home.posgrado.pdf.index', $data);
        $filename = 'doctorado'.time().'.pdf';
        return $pdf->stream($filename);
    }
    public function postgradoMaestriaPdf ()
    {
        $posgrados = postgrado::where('categoria', 'doctorado')->where('estado', 1)->get();
        $categoria = 'Maestría';
        $data = ['posgrados'=>$posgrados, 'categoria'=>$categoria,];
        $pdf = PDF::loadView('home.posgrado.pdf.index', $data);
        $filename = 'maestria'.time().'.pdf';
        return $pdf->stream($filename);
    }

}
