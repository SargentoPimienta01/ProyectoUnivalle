<?php

namespace App\Http\Controllers;

use App\Models\CategoriaMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriaMenuController extends Controller
{
    public function index()
    {
        $categorias = CategoriaMenu::where('estado', 1)->get();
        return view('categoria_menus.index', compact('categorias'));
    }


    public function create()
    {
        $categorias = CategoriaMenu::all();
        return view('categoria_menus.create', ['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable',
        ]);
            /*
                    CategoriaMenu::create($request->all());

                    return Redirect::route('categoria_menus.index')->with('success', 'Categoría de menú creada correctamente.');
            */

            $categoria = new CategoriaMenu();
            $categoria->nombre = $request->input('nombre');
            $categoria->descripcion = $request->input('descripcion');

        
            $categoria->save();
    
            return view("categoria_menus.message", ['msg' => "Registro guardado"]);
    }

    public function edit( $id)
    {
        $categoria = CategoriaMenu::findOrFail($id);
        return view('categoria_menus.edit', compact('categoria'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:50|alpha',
            'descripcion' => 'nullable|'
        ]);

        $categoria = CategoriaMenu::find($id);
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();

        return view("categoria_menus.message", ['msg' => "Registro modificado"]);
    }

    public function destroy($id) {
        // Encuentra el registro que deseas eliminar por su ID
        $categoria = CategoriaMenu::find($id);
    
        // Verifica si el registro existe
        if (!$categoria) {
            // Puedes manejar el caso en el que el registro no se encuentra, por ejemplo, redirigiendo a una página de error o mostrando un mensaje.
            return redirect()->route('categoria_menus.index')->with('error', 'La categoría de menú no existe.');
        }

        $categoria->delete();
    
        // Redirige a la página deseada después de la eliminación
        return redirect()->route('categoria_menus.index')->with('success', 'Categoría de menú eliminada correctamente.');
    }
    
    public function show($id)
        {
            $categoria = CategoriaMenu::findOrFail($id);
            return view('categoria_menus.show', compact('categoria'));
        }

        public function inactivos()
        {
            $categoriasInactivas = CategoriaMenu::where('estado', 0)->get();
            return view('categoria_menus.inactivos', compact('categoriasInactivas'));
        }
        

        public function cambiarEstado($id)
        {
            // Encuentra el registro que deseas modificar por su ID
            $categoria = CategoriaMenu::find($id);
        
            // Verifica si el registro existe
            if (!$categoria) {
                // Puedes manejar el caso en el que el registro no se encuentra, por ejemplo, redirigiendo a una página de error o mostrando un mensaje.
                return redirect()->route('categoria_menus.index')->with('error', 'La categoría de menú no existe.');
            }
        
            // Cambia el estado según el estado anterior
            $categoria->estado = ($categoria->estado == 1) ? 0 : 1;
        
            // Guarda la modificación
            $categoria->save();
        
            // Redirige a la página deseada después de cambiar el estado
            return redirect()->route('categoria_menus.index')->with('success', 'Estado de la categoría de menú cambiado correctamente.');
        }
        

}