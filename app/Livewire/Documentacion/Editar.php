<?php

namespace App\Livewire\Documentacion;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Documentacion;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;

class Editar extends ModalComponent
{
    use WithFileUploads;

    public $documento;
    public $documento_id;
    
    // Campos del formulario
    public $codigo;
    public $titulo;
    public $descripcion;
    public $tipo;
    public $area;
    public $version;
    public $estado;
    public $documento_referenciado_id;
    public $new_pdf;
    public $new_word;
    public $revisor_id;
    public $aprobador_id;
    public $fecha_revision;
    public $fecha_aprobacion;
    
    // Archivos actuales
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
        'new_pdf' => 'nullable|file|mimes:pdf',
        'new_word' => 'nullable|file|mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'revisor_id' => 'nullable|exists:users,id',
        'aprobador_id' => 'nullable|exists:users,id',
        'fecha_revision' => 'nullable|date',
        'fecha_aprobacion' => 'nullable|date',
    ];

    public function mount($id)
    {
        $this->documento = Documentacion::findOrFail($id);
        $this->documento_id = $id;
        
        // Inicializar campos
        $this->codigo = $this->documento->codigo;
        $this->titulo = $this->documento->titulo;
        $this->descripcion = $this->documento->descripcion;
        $this->tipo = $this->documento->tipo;
        $this->area = $this->documento->area;
        $this->version = $this->documento->version;
        $this->estado = $this->documento->estado;
        $this->documento_referenciado_id = $this->documento->documento_referenciado_id;
        $this->current_pdf = $this->documento->pdf_path;
        $this->current_word = $this->documento->word_path;
        $this->revisor_id = $this->documento->revisor_id;
        $this->aprobador_id = $this->documento->aprovador_id;
        $this->fecha_revision = $this->documento->fecha_revision;
        $this->fecha_aprobacion = $this->documento->fecha_aprobacion;
    }

    public function save()
    {
        
        $this->validate();

        $data = [
            'codigo' => $this->codigo,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'tipo' => $this->tipo,
            'area' => $this->area,
            'version' => $this->version,
            'estado' => $this->estado,
            'documento_referenciado_id' => $this->documento_referenciado_id,
            'revisor_id' => $this->revisor_id,
            'aprovador_id' => $this->aprobador_id,
            'fecha_revision' => $this->fecha_revision,
            'fecha_aprobacion' => $this->fecha_aprobacion,
        ];

        // Manejar PDF
        if ($this->new_pdf) {
            // Eliminar PDF anterior si existe
            if ($this->current_pdf) {
                Storage::disk('public')->delete($this->current_pdf);
            }
            $pdfPath = $this->new_pdf->storeAs(
                'documentos', 
                Str::slug($this->codigo) . '_v' . str_replace('.', '-', $this->version) . '.pdf', 
                'public'
            );
            $data['pdf_path'] = $pdfPath;
        }

        // Manejar Word
        if ($this->new_word) {
            // Eliminar Word anterior si existe
            if ($this->current_word) {
                Storage::disk('public')->delete($this->current_word);
            }
            $wordPath = $this->new_word->store(
                'documentos', 
                'public'
            );
            $data['word_path'] = $wordPath;
        }

        $this->documento->update($data);

        session()->flash('message', 'Documento actualizado exitosamente!');
        return redirect()->route('documentacion.index');
    }

    public function cancel()
    {
        return redirect()->route('documentacion.index');
    }

    public function render()
    {
        return view('livewire.documentacion.editar', [
            'documentos' => Documentacion::where('id', '!=', $this->documento_id)->get(),
            'usuarios' => User::all()
        ]);
    }
}