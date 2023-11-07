<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function subirImagen(Request $request)
    {
        $imagen = $request->file('imagen');
        $api_key = '053648b06603be2d33ae1491a2b5eb18'; // Reemplaza con tu clave API de ImgBB

        $ch = curl_init('https://api.imgbb.com/1/upload?key=' . $api_key);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'image' => base64_encode(file_get_contents($imagen))
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $resultado = json_decode($response, true);

        // Puedes manejar la respuesta de ImgBB aquí y almacenar el enlace generado en tu base de datos si lo deseas

        return redirect()->back()->with('mensaje', 'Imagen subida con éxito: ' . $resultado['data']['url']);
    }

}
