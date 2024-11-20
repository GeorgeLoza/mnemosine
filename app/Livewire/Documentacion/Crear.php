<?php

namespace App\Livewire\Documentacion;
use Livewire\WithFileUploads;
use App\Models\Documentacion;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    /* Inputs */


    public $titulo;
    public $descripcion;
    public $tipo; // Ejemplo: Manual, Procedimiento, Política, etc.
    public $archivo; // Para subir un archivo en la documentación

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:500',
        'tipo' => 'required|string|max:100',
        'archivo' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Cambia según las necesidades
    ];
    public function render()
    {
        return view('livewire.documentacion.crear');
    }
    public function save()
    {

        $this->validate();

        try {
            $rutaArchivo = $this->archivo ? $this->archivo->store('documentacion', 'public') : null;

            Documentacion::create([
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion,
                'categoria' => $this->categoria,
                'pdf_path' => $rutaArchivo,
            ]);

            $this->closeModal();
            $this->dispatch('actualizarDocumentacion');
            Toaster::success('¡Documento creado exitosamente!');
        } catch (\Throwable $th) {
            Toaster::error('Error al crear el documento: ' . $th->getMessage());
        }
    }
}
