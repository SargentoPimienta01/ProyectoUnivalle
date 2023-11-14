<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

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
}
