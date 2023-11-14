<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function generateQrCode()
    {
        // Configuración básica
        $qrCode = QrCode::size(300)->generate('Texto o datos para el código QR');

        // Mostrar el código QR en la vista
        return view('qr.qrcode', ['qrCode' => $qrCode]);
    }
}

