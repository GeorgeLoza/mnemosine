<?php

namespace App\Livewire\Documentacion;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Documentacion;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Editar extends ModalComponent
{
    use WithFileUploads;

    public $documento_id;
    public $codigo;
    public $titulo;
    public $descripcion;
    public $tipo;
    public $area;
    public $version;
    public $estado;
    public $documento_referenciado_id;
    public $pdf_path;
    public $word_path;
    public $creador_id;
    public $revisor_id;
    public $aprovador_id;
    public $fecha_creacion;
    public $fecha_revision;
    public $fecha_aprobacion;
    public $presentacion;
    
    // Archivos existentes
    public $current_pdf;
    public $current_word;

    protected $rules = [
        'codigo' => 'required',
        'titulo' => 'required|min:5',
        'descripcion' => 'nullable',
        'tipo' => 'required',
        'area' => 'required',
        'version' => 'required',
        'estado' => 'required',
        'documento_referenciado_id' => 'nullable|exists:documentacions,id',
        'pdf_path' => 'nullable|file|mimes:pdf|max:5120',
        'word_path' => 'nullable|file|mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:5120',
        'creador_id' => 'nullable|exists:users,id',
        'revisor_id' => 'nullable|exists:users,id',
        'aprovador_id' => 'nullable|exists:users,id',
        'fecha_creacion' => 'nullable|date',
        'fecha_revision' => 'nullable|date',
        'fecha_aprobacion' => 'nullable|date',
        'presentacion' => 'nullable',
    ];

    public function mount($id)
    {
        $documento = Documentacion::findOrFail($id);
        $this->documento_id = $id;

        // Inicializar campos
        $this->codigo = $documento->codigo;
        $this->titulo = $documento->titulo;
        $this->descripcion = $documento->descripcion;
        $this->tipo = $documento->tipo;
        $this->area = $documento->area;
        $this->version = $documento->version;
        $this->estado = $documento->estado;
        $this->documento_referenciado_id = $documento->documento_referenciado_id;
        $this->current_pdf = $documento->pdf_path;
        $this->current_word = $documento->word_path;
        $this->creador_id = $documento->creador_id;
        $this->revisor_id = $documento->revisor_id;
        $this->aprovador_id = $documento->aprovador_id;
        $this->fecha_creacion = $documento->fecha_creacion;
        $this->fecha_revision = $documento->fecha_revision;
        $this->fecha_aprobacion = $documento->fecha_aprobacion;
        $this->presentacion = $documento->presentacion;
    }

    public function save()
    {
        $this->validate();

        $documento = Documentacion::findOrFail($this->documento_id);
        $data = [
            'codigo' => $this->codigo,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'tipo' => $this->tipo,
            'area' => $this->area,
            'version' => $this->version,
            'estado' => $this->estado,
            'documento_referenciado_id' => $this->documento_referenciado_id,
            'creador_id' => $this->creador_id,
            'revisor_id' => $this->revisor_id,
            'aprovador_id' => $this->aprovador_id,
            'fecha_creacion' => $this->fecha_creacion,
            'fecha_revision' => $this->fecha_revision,
            'fecha_aprobacion' => $this->fecha_aprobacion,
            'presentacion' => $this->presentacion,
        ];
        $data['pdf_path'] = $pdfPath ?? $this->current_pdf;
        $data['word_path'] = $wordPath ?? $this->current_word;
                

        // Manejar PDF
        if ($this->pdf_path) {
            // Eliminar PDF anterior si existe
            if ($this->current_pdf) {
                Storage::disk('public')->delete($this->current_pdf);
            }
            $pdfPath = $this->pdf_path->storeAs(
                'documentos',
                Str::slug($this->codigo) . '_v' . str_replace('.', '-', $this->version) . '.pdf',
                'public'
            );
            $data['pdf_path'] = $pdfPath;
        } else {
            $data['pdf_path'] = $this->current_pdf;
        }

        // Manejar Word
        if ($this->word_path) {
            // Eliminar Word anterior si existe
            if ($this->current_word) {
                Storage::disk('public')->delete($this->current_word);
            }
            $wordPath = $this->word_path->store(
                'documentos',
                'public'
            );
            $data['word_path'] = $wordPath;
        } else {
            $data['word_path'] = $this->current_word;
        }

        try {
            $documento->update($data);
            
            Toaster::success('Documento actualizado exitosamente!');
            $this->closeModal();
            return redirect()->route('documentacion.index');
        } catch (\Throwable $th) {
            Toaster::error('Error al actualizar: ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.documentacion.editar', [
            'documentos' => Documentacion::where('tipo', 'Procedimiento')
                                ->where('id', '!=', $this->documento_id)
                                ->get(),
            'usuarios' => User::where('cargo','Documentacion')->get()
        ]);
    }
}