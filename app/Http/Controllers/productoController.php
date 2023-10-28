<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\CategoriaMenu;
use Illuminate\Http\Request;

use App\Exports\ProductosExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class productoController extends Controller
{
   
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $productos = Producto::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->paginate(5);

        return view('productos.index', compact('productos', 'busqueda'));
    }


    public function buscar(Request $request)
    {
        $query = $request->input('q');
        $resultados = Producto::where('nombre', 'LIKE', '%' . $query . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $query . '%')
            ->get();

        return view('resultado', compact('resultados'));
    }


    public function estados(Request $request)
    {
        $resultadosEliminados = Producto::onlyTrashed()->get();
        return view('productos.estados', compact('resultadosEliminados'));
    }

   
    public function create()
    {
        $categorias = CategoriaMenu::all();
        return view('productos.create', compact('categorias'));
    }

    
     public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[A-Za-z]+$/|max:40',
            'descripcion' => 'required|max:70',
            'precio' => 'required|numeric',
            'foto' => 'required',
            
        ]);
                
            $producto = new Producto();
            $producto->nombre = $request->input('nombre');
            $producto->descripcion = $request->input('descripcion');
            $producto->precio = $request->input('precio');
            
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);
                $producto->foto = $imageName;
            }
            $producto->save();
    
            return view("productos.message", ['msg' => "Registro guardado"]);
    }
    

   
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('productos.show', compact('producto'));
    }

   
    public function edit( $id)
    {
        $producto = producto::find($id);
        return view ('productos.edit', ['producto' => $producto]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'  ,
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable|',
            'precio' => 'required|'
        ]);

        $producto = Producto::find($id);
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio'); 
        $producto->save();

        return view("productos.message", ['msg' => "Registro modificado"]);
    }
  
    public function destroy($id)
    {
      /**   $producto = producto::find($id);
     *   $producto->DELETE();
      *  return redirect("productos");
        */
        producto::find($id)->delete();
        return back()->with('success','Producto eliminado correctamente');
    }

    public function delete($id)
    {
      /**   $producto = producto::find($id);
     *   $producto->DELETE();
      *  return redirect("productos");
        */
        producto::find($id)->delete();
        return back()->with('success','Producto eliminado correctamente');
    }


    public function trashed(){
        $producto = producto::onlyTrashed()->get();
        return view('trashed', compact('producto'));
    }

    public function activar($id)
    {
        $producto = producto::findOrFail($id);
        $producto->estado = true;
        $producto->save();
    
        return redirect()->back()->with('success', "Producto activado correctamente.");
    }

    public function desactivar($id)
    {
        $producto = producto::findOrFail($id);
        $producto->estado = false;
        $producto->save();

        return redirect()->back()->with('success', "Producto desactivado correctamente.");
    }

    public function generarReporte()

        {
            $productos = DB::table('productos')->get();
            $pdf = app('dompdf.wrapper');
            
            $pdf->loadView('productos.productospdf', compact('productos'));
            return $pdf->download('reporteProductos.pdf');
            
        }

    }
