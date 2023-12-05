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


class ProductoController extends Controller
{
   
    public function index(Request $request)
{
    $busqueda = $request->busqueda;
    $productos = Producto::where('nombre', 'LIKE', '%' . $busqueda . '%')
        ->where('estado', 1)
        ->paginate(5);

    return view('admin.cafecito.productos.index', compact('productos', 'busqueda'));
}


    public function inactivos(Request $request)
    {
        $busqueda = $request->busqueda;
        $productos = Producto::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->where('estado', 0)
            ->paginate(5);
        return view('admin.cafecito.productos.inactivos', compact('productos', 'busqueda'));
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
        return view('admin.cafecito.productos.estados', compact('resultadosEliminados'));
    }

   
    public function create()
    {
        $categorias = CategoriaMenu::all();
        return view('admin.cafecito.productos.create', compact('categorias'));
    }

    
     public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[A-Za-z]+$/|max:40',
            'descripcion' => 'required|max:70',
            'precio' => 'required|numeric',
            'foto' => 'required',
            'id_categoria' => 'required',
        ]);
                
            $producto = new Producto();
            $producto->nombre = $request->input('nombre');
            $producto->descripcion = $request->input('descripcion');
            $producto->precio = $request->input('precio');
            
            // Manejo de la imagen
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $api_key = '053648b06603be2d33ae1491a2b5eb18'; // Reemplaza con tu clave API de ImgBB

            $ch = curl_init('https://api.imgbb.com/1/upload?key=' . $api_key);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'image' => base64_encode(file_get_contents($image->path())),
            ]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);

            if ($response === false) {
                return redirect()->back()->with('error', 'Error al subir la imagen a ImgBB: ' . curl_error($ch));
            }

            curl_close($ch);

            $resultado = json_decode($response, true);

            $producto->foto = $resultado['data']['url']; // Almacena el enlace de la imagen en el campo 'foto'
        }

        $producto->id_categoria = $request->input('id_categoria');

        $producto->save();
    
        return view("productos.message", ['msg' => "Registro guardado"]);
    }
    

   
    public function show($id)
    {
        $producto = Producto::find($id);
    
        if (!$producto) {
            return abort(404); // O puedes redirigir a una vista personalizada para el error 404
        }
    
        return view('admin.cafecito.productos.show', compact('producto'));
    }
    

   
    public function edit( $id)
    {
        $producto = producto::find($id);
        $categorias = CategoriaMenu::all();
        return view('admin.cafecito.productos.edit', ['producto' => $producto, 'categorias' => $categorias]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'  ,
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable|',
            'precio' => 'required|',
            'id_categoria' => 'required',
        ]);

        $producto = Producto::find($id);
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        
        // Manejo de la imagen
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $api_key = '053648b06603be2d33ae1491a2b5eb18'; // Reemplaza con tu clave API de ImgBB

            $ch = curl_init('https://api.imgbb.com/1/upload?key=' . $api_key);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'image' => base64_encode(file_get_contents($image->path())),
            ]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);

            if ($response === false) {
                return redirect()->back()->with('error', 'Error al subir la imagen a ImgBB: ' . curl_error($ch));
            }

            curl_close($ch);

            $resultado = json_decode($response, true);

            $producto->foto = $resultado['data']['url']; // Almacena el enlace de la imagen en el campo 'foto'
        }

        $producto->id_categoria = $request->input('id_categoria');

        $producto->save();

        return view("productos.message", ['msg' => "Registro modificado"]);
    }
  
    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
    

    public function delete($id)
    {
        Producto::find($id)->delete();
        return back()->with('success', 'Producto eliminado correctamente');
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
            
            $pdf->loadView('admin.cafecito.productos.productospdf', compact('productos'));
            return $pdf->download('reporteProductos.pdf');
            
        }

    }
