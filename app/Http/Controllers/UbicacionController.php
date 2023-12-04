<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

/**
 * Class UbicacionController
 * @package App\Http\Controllers
 */
class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $ubicaciones = Ubicacion::where('estado', 1)
            ->where(function ($query) use ($search) {
                $query->where('nombre_ubicacion', 'like', "%$search%");
            })
            ->paginate(10);

        return view('admin.ubicacion.index', compact('ubicaciones', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $ubicaciones->perPage());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ubicacion = new Ubicacion();
        return view('admin.ubicacion.create', compact('ubicacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos de ubicación
        $request->validate(Ubicacion::$rules);

        // Crear la ubicación con los datos del request
        $ubicacion = Ubicacion::create($request->except('imagen'));

        // Manejo de la imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $api_key = '053648b06603be2d33ae1491a2b5eb18'; // Reemplaza con tu clave API de ImgBB

            $ch = curl_init('https://api.imgbb.com/1/upload?key=' . $api_key);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'image' => base64_encode(file_get_contents($imagen->path())),
            ]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);

            if ($response === false) {
                return redirect()->back()->with('error', 'Error al subir la imagen a ImgBB: ' . curl_error($ch));
            }

            curl_close($ch);

            $resultado = json_decode($response, true);

            // Almacenar la URL de la imagen en el campo 'Image' de la ubicación
            $ubicacion->update([
                'Image' => $resultado['data']['url'],
            ]);
        }

        return redirect()->route('ubicacion.index')->with('success', 'Ubicacion created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ubicacion = Ubicacion::find($id);

        return view('admin.ubicacion.show', compact('ubicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ubicacion = Ubicacion::find($id);

        return view('admin.ubicacion.edit', compact('ubicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ubicacion $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ubicacion $ubicacion)
    {
        // Validación de los datos de ubicación
        $request->validate(Ubicacion::$rules);

        // Actualizar los campos de ubicación con los datos del request
        $ubicacion->update($request->except('imagen'));

        // Manejo de la imagen si se proporciona una nueva
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $api_key = '053648b06603be2d33ae1491a2b5eb18'; // Reemplaza con tu clave API de ImgBB

            $ch = curl_init('https://api.imgbb.com/1/upload?key=' . $api_key);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'image' => base64_encode(file_get_contents($imagen->path())),
            ]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);

            if ($response === false) {
                return redirect()->back()->with('error', 'Error al subir la imagen a ImgBB: ' . curl_error($ch));
            }

            curl_close($ch);

            $resultado = json_decode($response, true);

            // Actualizar el campo 'Image' con la nueva URL de la imagen
            $ubicacion->update([
                'Image' => $resultado['data']['url'],
            ]);
        }

        return redirect()->route('ubicacion.index')->with('success', 'Ubicacion updated successfully');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ubicacion = Ubicacion::find($id)->delete();

        return redirect()->route('ubicacion.index')
            ->with('success', 'Ubicacion deleted successfully');
    }

    public function toggleEstado($id)
    {
        $ubicacion = Ubicacion::find($id);

        if (!$ubicacion) {
            return redirect()->back()->with('error', 'Ubicación no encontrada.');
        }

        // Cambiar el estado
        $ubicacion->estado = !$ubicacion->estado;
        $ubicacion->save();

        $message = $ubicacion->estado ? 'Ubicación activada exitosamente.' : 'Ubicación desactivada exitosamente.';

        return redirect()->route($ubicacion->estado ? 'ubicacion.index' : 'admin.ubicacion.inactivas')->with('success', $message);
    }


    public function inactivas(Request $request)
    {
        $search = $request->input('search');

        $ubicacionesInactivas = Ubicacion::where('estado', 0)
            ->where(function ($query) use ($search) {
                $query->where('nombre_ubicacion', 'like', "%$search%");
            })
            ->paginate(10);

        return view('admin.ubicacion.inactivas', compact('ubicacionesInactivas', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $ubicacionesInactivas->perPage());
    }

}
