<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
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
use App\Models\Postgrado;
use App\Models\PlataformaDeAtencion;
use App\Models\Biblioteca;
use App\Models\Producto;
use App\Models\CategoriaMenu;
use App\Models\Naf;
use App\Models\RequisitosNaf;

class HomeController extends Controller
{
    public function index()
    {
        $areas = Area::where('estado', 1)->get();
        return view('home', compact('areas'));
    }


    public function tramites()
    {
        $ctramites = CategoriaTramites::where('estado', 1)->get();
        return view('home.tramites.ctramites', ['ctramites' => $ctramites]);
    }


    public function tramitesdisponibles($id_categoria_tramites, $nombre_categoria = null)
    {
        // Obtén la categoría de trámites correspondiente si se proporciona un ID
        $ctramite = $id_categoria_tramites ? CategoriaTramites::find($id_categoria_tramites) : null;

        // Obtén los trámites que pertenecen a esa categoría y que tengan estado igual a 1
        $tramites = Tramite::where('id_categoria_tramites', $id_categoria_tramites)
            ->where('estado', 1)
            ->get();

        return view('home.tramites.tramites', ['ctramite' => $ctramite, 'tramites' => $tramites, 'nombre_categoria' => $nombre_categoria]);
    }


    public function requisitos($id_categoria_tramites, $nombre_categoria, $id_tramite, $nombre_tramite = null)
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

        return view('home.tramites.requisitos', [
            'nombreCategoria' => $nombre_categoria,
            'idCategoriaTramites' => $id_categoria_tramites,
            'idTramite' => $id_tramite,
            'nombreTramite' => $nombre_tramite,
            'duracionTramite' => $duracionTramite,
            'tituloTramite' => $tituloTramite,
            'requisitos' => $requisitos,
            'ubicacionTramite' => $ubicacionTramite
        ]);
    }




    public function cajas()
    {
        $cajas = Caja::where('estado', 1)->get();
        return view('home.cajas.cajas', ['cajas' => $cajas]);
    }


    public function requisitosCaja($idCaja, $nombre = null)
    {
        // Obtén la información de la caja correspondiente al requisito
        $requisitoCaja = Caja::find($idCaja);
    
        // Obtén los requisitos de la caja con estado 1
        $requisitos = RequisitoCaja::where('Id_caja', $idCaja)
            ->where('estado', 1)
            ->get();
    
        return view('home.cajas.requisitos', [
            'requisitoCaja' => $requisitoCaja,
            'requisitos' => $requisitos,
            'nombre' => $nombre,
        ]);
    }
    

    public function bienestaruniversitario ()
    {
        $bienestares = BienestarUniversitario::where('estado', 1)->get();
        return view ('home.bienestar.index', ['bienestares' => $bienestares]);
    }

    public function requisitosBienestaru($idBienestar, $servicio = null)
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
    
        return view('home.bienestar.servicios', [
            'servicioBienestar' => $servicioBienestar,
            'servicios' => $servicios,
            'servicio' => $servicio,
            'ubicacion' => $ubicacion,
        ]);
    }

    public function direccioncarrera()
    {
        $direcciones = DireccionCarrera::where('estado', 1)->get();
        return view ('home.direccioncarrera.index', ['direcciones' => $direcciones]);
    }

    public function serviciosDireccion($idDireccion, $servicio = null)
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
    
        return view('home.direccioncarrera.servicios', [
            'servicioDireccion' => $servicioDireccion,
            'servicios' => $servicios,
            'servicio' => $servicio,
            'ubicacion' => $ubicacion,
        ]);
    }

    public function campus ()
    {
        $campuses = Campus::where('estado', 1)->get();
        return view('home.campus.index', ['campuses' => $campuses]);
    }

    public function plataformadeatencion ()
    {
        $plataformasdeatencion = PlataformaDeAtencion::where('estado', 1)->get();
        return view ('home.plataforma-de-atencion.index', ['plataformasdeatencion' => $plataformasdeatencion]);
    }

    public function paservicios ()
    {
        $plataformasdeatencion = PlataformaDeAtencion::where('estado', 1)->get();
        return view ('home.plataforma-de-atencion.servicios', ['plataformasdeatencion' => $plataformasdeatencion]);
    }
    public function naf ()
    {
        $nafs = Naf::where('estado', 1)->get();
        $requisitosNaf = RequisitosNaf::where('estado', 1)->get();
        return view ('home.naf.index', ['nafs' => $nafs, 'requisitosNaf'=> $requisitosNaf]);
    }

    public function cafeteria ()
    {
        $categorias = CategoriaMenu::where('estado',1)->get()/*paginate(3)*/;
        $productos = Producto::where('estado', 1)->get();
        return view ('home.cafeteria.index', ['categorias' => $categorias, 'productos'=> $productos]);	
    }

    public function biblioteca()
    {
        $bibliotecas = Biblioteca::where('estado', 1)->paginate(2);
        return view('home.biblioteca.index', ['bibliotecas' => $bibliotecas]);
    }


    public function posgrado ()
    {
        /*$posgrados = Postgrado::where('estado', 1)->get();
        return view('home.posgrado.index', ['posgrados' => $posgrados]);*/
        $posgrados = Postgrado::where('estado', 1)->get();
        return view('home.posgrado.posgrados', ['posgrados' => $posgrados]);
    }

    public function postgradoDiplomado ()
    {
        $posgrados = Postgrado::where('categoria', 'diplomado')->where('estado', 1)->get();

        return view('home.posgrado.index', compact('posgrados'));
    }
    public function postgradoDoctorado ()
    {
        $posgrados = Postgrado::where('categoria', 'maestria')->where('estado', 1)->get();

        return view('home.posgrado.index', compact('posgrados'));
    }
    public function postgradoMaestria ()
    {
        $posgrados = Postgrado::where('categoria', 'doctorado')->where('estado', 1)->get();

        return view('home.posgrado.index', compact('posgrados'));
    }

    public function gabinetemedico ()
    {
        return view ('home.gabinete-medico.index');
    }
}
