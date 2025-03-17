<?php

namespace App\Http\Controllers;

use App\Models\Documentacion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function verPDF($id)
    {
        $documento = Documentacion::findOrFail($id);

        $pdfPath = "private/{$documento->pdf_path}";

        if (!Storage::exists($pdfPath)) {
            abort(404, "El archivo PDF no se encuentra en el sistema.");
        }

        return response()->file(storage_path("app/{$pdfPath}"), [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($pdfPath) . '"',
        ]);
    }
}
