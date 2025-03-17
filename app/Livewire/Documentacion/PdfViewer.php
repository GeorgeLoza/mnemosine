<?php

namespace App\Livewire\Documentacion;

use App\Models\Documentacion;
use Livewire\Component;

class PdfViewer extends Component
{
    public $documento;
    public $pdfUrl;

    public function mount($id)
    {
        $this->documento = Documentacion::findOrFail($id);
        $this->pdfUrl=asset('storage/'.$this->documento->pdf_path);
    }


    public function render()
    {
        return view('livewire.documentacion.pdf-viewer');
    }
}
