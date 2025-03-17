<?php

namespace App\Observers;

use App\Models\Documentacion;
use Illuminate\Support\Facades\Storage;

class DocumentacionObserver
{
    /**
     * Handle the Documentacion "created" event.
     */
    public function created(Documentacion $documentacion): void
    {
        //
    }

    /**
     * Handle the Documentacion "updated" event.
     */
    public function updated(Documentacion $documentacion): void
    {
        //
    }

    /**
     * Handle the Documentacion "deleted" event.
     */
    public function deleted(Documentacion $documentacion): void
    {
        //
    }

    /**
     * Handle the Documentacion "restored" event.
     */
    public function restored(Documentacion $documentacion): void
    {
        //
    }

    /**
     * Handle the Documentacion "force deleted" event.
     */
    public function forceDeleted(Documentacion $documentacion): void
    {
        //
    }

    public function deleting(Documentacion $documento)
{
    // Eliminar archivos antes de borrar el registro
    if($documento->pdf_path) {
        Storage::disk('public')->delete($documento->pdf_path);
    }
    if($documento->word_path) {
        Storage::disk('public')->delete($documento->word_path);
    }
}
}
