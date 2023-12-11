<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicioDireccion;
use App\Models\DireccionCarrera;

class ServicioDireccionController extends Controller
{
    public function index($direccion_carrera_id)
    {
        // Obtén solo los servicios de dirección relacionados con la dirección de carrera y con estado 1
        $serviciosDireccion = ServicioDireccion::where('direccion_carrera_id', $direccion_carrera_id)
            ->where('estado', 1)
            ->paginate();

        $servicioDireccion = new ServicioDireccion();

        $direccionCarrera = DireccionCarrera::find($direccion_carrera_id);

        return view('admin.direccioncarrera.servicios.index', compact('serviciosDireccion', 'servicioDireccion', 'direccion_carrera_id', 'direccionCarrera'))
            ->with('i', (request()->input('page', 1) - 1) * $serviciosDireccion->perPage());
    }

    public function inactivos()
    {
        // Obtén todos los servicios de dirección inactivos paginados
        $serviciosInactivos = ServicioDireccion::where('estado', 0)->paginate();

        // Puedes pasar los servicios inactivos paginados a la vista correspondiente
        return view('admin.direccioncarrera.servicios.inactivos', compact('serviciosInactivos'));
    }

    public function create($direccion_carrera_id)
    {
        $servicioDireccion = new ServicioDireccion();
        return view('admin.direccioncarrera.servicios.create', compact('servicioDireccion', 'direccion_carrera_id'));
    }

    public function store(Request $request, $direccion_carrera_id)
    {
        // Validación del formulario
        $request->validate([
            'Titulo' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta según tus necesidades
            'Requisitos' => 'required',
            'estado' => 'required',
        ]);

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

            // Validación y creación del servicio de dirección
            $servicioDireccion = new ServicioDireccion([
                'Titulo' => $request->Titulo,
                'Requisitos' => $request->Requisitos,
                'estado' => $request->estado,
                'direccion_carrera_id' => $direccion_carrera_id,
                'Image' => $resultado['data']['url'], // Almacena el enlace de la imagen en el campo 'Image'
            ]);

            $servicioDireccion->save();

            // Redirigir al índice de servicios de dirección
            return redirect()->route('servicio-direccion.index', ['direccion_carrera_id' => $direccion_carrera_id])
                ->with('success', 'Servicio de Dirección creado exitosamente.');
        }

        // Si no se ha cargado una imagen, redirige de vuelta con un mensaje de error
        return redirect()->back()->with('error', 'Por favor, selecciona una imagen para subir.');
    }



    public function edit($direccion_carrera_id, $id)
    {
        // Recupera el servicio de dirección que se va a editar
        $servicioDireccion = ServicioDireccion::find($id);

        // Puedes necesitar más lógica aquí según tus requerimientos

        // Retorna la vista de edición con el servicio de dirección
        return view('admin.direccioncarrera.servicios.edit', compact('servicioDireccion', 'id', 'direccion_carrera_id'));
    }

    public function update(Request $request, $direccion_carrera_id, $id)
{
    // Encuentra el servicio de dirección a actualizar
    $servicioDireccion = ServicioDireccion::findOrFail($id);

    // Validación del formulario
    $request->validate([
        'Titulo' => 'required',
        'imagen' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Se permite que sea opcional
        'Requisitos' => 'required',
        'estado' => 'required',
    ]);

    // Si se proporciona una nueva imagen, realiza el manejo de la imagen
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

        // Actualiza los campos, incluyendo la nueva imagen
        $servicioDireccion->update([
            'Titulo' => $request->Titulo,
            'Requisitos' => $request->Requisitos,
            'estado' => $request->estado,
            'Image' => $resultado['data']['url'], // Almacena el enlace de la nueva imagen en el campo 'Image'
        ]);
    } else {
        // Si no se proporciona una nueva imagen, actualiza los demás campos sin afectar 'Image'
        $servicioDireccion->update($request->except('Image'));
    }

    // Redirige al índice de servicios de dirección
    return redirect()->route('servicio-direccion.index', ['direccion_carrera_id' => $direccion_carrera_id])
        ->with('success', 'Servicio de Dirección actualizado exitosamente.');
}


    public function cambiarEstado($direccion_carrera_id, $id)
    {
        // Encuentra el servicio de dirección por su ID
        $servicioDireccion = ServicioDireccion::findOrFail($id);

        // Guarda el direccion_carrera_id antes de cambiar el estado
        $direccion_carrera_id = $servicioDireccion->direccion_carrera_id;

        // Cambia el estado
        $servicioDireccion->estado = $servicioDireccion->estado == 1 ? 0 : 1;
        $servicioDireccion->save();

        // Redirige a diferentes vistas según el estado cambiado
        if ($servicioDireccion->estado == 0) {
            // Si el estado es 0, redirige a la vista de inactivos
            /*return redirect()->route('servicio-direccion.inactivos', ['direccion_carrera_id' => $direccion_carrera_id])
                ->with('success', 'Estado cambiado exitosamente.');*/
            return redirect()->route('servicio-direccion.index', ['direccion_carrera_id' => $direccion_carrera_id])
                ->with('success', 'Estado cambiado exitosamente.');
        } else {
            // Si el estado es 1, redirige a la vista de servicios activos
            return redirect()->route('servicio-direccion.index', ['direccion_carrera_id' => $direccion_carrera_id])
                ->with('success', 'Estado cambiado exitosamente.');
        }
    }

}
