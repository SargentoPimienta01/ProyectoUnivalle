<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use Illuminate\Http\Request;

use App\Exports\ProductosExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class bibliotecaController extends Controller
{
   
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $bibliotecas = Biblioteca::where('titulo', 'LIKE', '%' . $busqueda . '%')
            ->paginate(5);

        return view('bibliotecas.index', compact('bibliotecas', 'busqueda'));
    }


    public function buscar(Request $request)
    {
        $query = $request->input('q');
        $resultados = Biblioteca::where('titulo', 'LIKE', '%' . $query . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $query . '%')
            ->get();

        return view('resultado', compact('resultados'));
    }


    public function estados(Request $request)
    {
        $resultadosEliminados = Biblioteca::onlyTrashed()->get();
        return view('bibliotecas.estados', compact('resultadosEliminados'));
    }

   
    public function create()
    {
        //$categorias = CategoriaMenu::all();
        return view('bibliotecas.create');
    }

    
    public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required',
        'descripcion' => 'required',
        'hora' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    
    $biblioteca = new Biblioteca();
    $biblioteca->titulo = $request->input('titulo');
    $biblioteca->descripcion = $request->input('descripcion');
    $biblioteca->fecha = now()->format('Y-m-d');
    $biblioteca->hora = $request->input('hora');
    
    if ($request->hasFile('foto')) {
        $image = $request->file('foto');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);
        $biblioteca->foto = $imageName;
    }
    
    $biblioteca->save();
    
    return view("bibliotecas.message", ['msg' => "Registro guardado"]);
}

    
    

   
    public function show($id)
    {
        $biblioteca = Biblioteca::find($id);
        return view('bibliotecas.show', compact('biblioteca'));
    }

   
    public function edit( $id)
    {
        $biblioteca = Biblioteca::find($id);
        return view ('bibliotecas.edit', ['biblioteca' => $biblioteca]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $biblioteca = Biblioteca::find($id);
        $biblioteca->titulo = $request->input('titulo');
        $biblioteca->descripcion = $request->input('descripcion');
        $biblioteca->fecha = $request->input('fecha');
        $biblioteca->hora = $request->input('hora');
        $biblioteca->foto = $request->file('foto') ? $this->uploadImage($request->file('foto')) : $biblioteca->foto;
        
        $biblioteca->save();
    
        return view("bibliotecas.message", ['msg' => "Registro modificado"]);
    }


    public function destroy($id)
    {
      /**   $producto = producto::find($id);
     *   $producto->DELETE();
      *  return redirect("productos");
        */
        Biblioteca::find($id)->delete();
        return back()->with('success','Producto eliminado correctamente');
    }

    public function delete($id)
    {
      /**   $producto = producto::find($id);
     *   $producto->DELETE();
      *  return redirect("productos");
        */
        Biblioteca::find($id)->delete();
        return back()->with('success','Producto eliminado correctamente');
    }


    public function trashed(){
        $biblioteca = Biblioteca::onlyTrashed()->get();
        return view('trashed', compact('biblioteca'));
    }

    public function activar($id)
    {
        $biblioteca = Biblioteca::findOrFail($id);
        $biblioteca->estado = true;
        $biblioteca->save();
    
        return redirect()->back()->with('success', "Producto activado correctamente.");
    }

    public function desactivar($id)
    {
        $biblioteca = Biblioteca::findOrFail($id);
        $biblioteca->estado = false;
        $biblioteca->save();

        return redirect()->back()->with('success', "Producto desactivado correctamente.");
    }

    public function generarReporte()

        {
            $bibliotecas = DB::table('bibliotecas')->get();
            $pdf = app('dompdf.wrapper');
            
            $pdf->loadView('bibliotecas.bibliotecaspdf', compact('bibliotecas'));
            return $pdf->download('reporteBiblioteca.pdf');
            
        }

    }
