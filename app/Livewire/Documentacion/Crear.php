<?php

namespace App\Livewire\Documentacion;
use Livewire\WithFileUploads;
use App\Models\Documentacion;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Crear extends ModalComponent
{
    use WithFileUploads;
// ... (partes anteriores del componente iguales)

public $codigo;
public $titulo;
public $descripcion;
public $tipo;
public $area;
public $version;
public $estado = 'Por revisar';
public $documento_referenciado_id;
public $pdf_path;
public $word_path;
public $revisor_id;
public $aprovador_id;
public $fecha_revision;
public $fecha_aprobacion;

protected $rules = [
    'codigo' => 'required',
    'titulo' => 'required|min:5',
    'descripcion' => 'nullable',
    'tipo' => 'required',
    'area' => 'required',
    'version' => 'required',
    'estado' => 'required',
    'documento_referenciado_id' => 'nullable|exists:documentacions,id',
    'pdf_path' => 'nullable|file|mimes:pdf',
    'word_path' => 'nullable|file|mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:5120',
    'revisor_id' => 'nullable|exists:users,id',
    'aprovador_id' => 'nullable|exists:users,id',
    'fecha_revision' => 'nullable|date',
    'fecha_aprobacion' => 'nullable|date',
];

public function save()
{
    
    if ($this->pdf_path) {
        // Obtener la extensión del archivo de forma segura
        $extension = $this->pdf_path->getClientOriginalExtension();

        // Verificar si la extensión es realmente PDF antes de almacenar
        if ($extension === 'pdf') {
            $pdfPath = $this->pdf_path->storeAs('documentos', $this->pdf_path->getClientOriginalName(), 'public');
        } else {
            dd('error', 'El archivo debe ser un PDF válido.');
            return;
        }
    } else {
        $pdfPath = null;
    }

    if ($this->word_path) {
        // Obtener la extensión del archivo de forma segura
        $extension = $this->word_path->getClientOriginalExtension();

        // Verificar si la extensión es realmente Word antes de almacenar
        if ($extension =='doc' || $extension =='docx') {
            $wordPath = $this->word_path->storeAs('documentos', $this->word_path->getClientOriginalName(), 'public');
        } else {
            dd('error', 'El archivo debe ser un Word válido.');
            return;
        }
    } else {
        $wordPath = null;
    }


    
    
    $documento = Documentacion::create([
        'codigo' => $this->codigo,
        'titulo' => $this->titulo,
        'descripcion' => $this->descripcion,
        'tipo' => $this->tipo,
        'area' => $this->area,
        'version' => $this->version,
        'estado' => $this->estado,
        'creador_id' => auth()->id(),
        'fecha_creacion' => now(),
        'documento_referenciado_id' => $this->documento_referenciado_id,
        'pdf_path' => $pdfPath,
        'word_path' => $wordPath,
        'revisor_id' => $this->revisor_id,
        'aprovador_id' => $this->aprovador_id,
        'fecha_revision' => $this->fecha_revision,
        'fecha_aprobacion' => $this->fecha_aprobacion,
    ]);

    session()->flash('message', 'Documento creado exitosamente!');
    return redirect()->route('documentacion.index');
}
    public function render()
    {
        return view('livewire.documentacion.crear', [
            'documentos' => Documentacion::where('tipo','Procedimiento')->get(),
            'usuarios' => User::all()
        ]);
    }

    
  }
