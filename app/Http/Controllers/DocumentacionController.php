<?php

namespace App\Http\Controllers;

use App\Models\Documentacion;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentacionController extends Controller
{
    public function download(Documentacion $documento): StreamedResponse
    {
        // Verifica que el archivo exista
        if (!Storage::disk('public')->exists($documento->pdf_path)) {
            abort(404, 'Archivo no encontrado');
        }

        // Genera nombre de descarga amigable
        $nombreDescarga = "{$documento->codigo}_v{$documento->version}.pdf";

        return Storage::disk('public')->download(
            $documento->pdf_path,
            $nombreDescarga,
            ['Content-Type' => 'application/pdf']
        );
    }

    public function ver(Documentacion $documentacion)
    {
        $this->authorize('view', $documentacion);
        
        $path = storage_path('app/private/documentos/' . $documentacion->pdf_path);
        
        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentacion->titulo.'"'
        ]);
    }
}
