<?php

namespace App\Livewire\Documentacion;

use App\Models\Documentacion;
use Livewire\Component;

class Ver extends Component
{
    public $id;
    public $doc;
    public $documentosArea;
    public $documentosProcedimiento;
    public function mount()
    {
        $this->doc = Documentacion::find($this->id);
        $this->documentosArea = Documentacion::where('area', $this->doc->area)->where('tipo', "Procedimiento")->get();
        if($this->doc->tipo == 'Procedimiento'){
            $this->documentosProcedimiento = Documentacion::where('documento_referenciado_id', $this->doc->id)->whereNot('tipo', "Procedimiento")->get();
        }
        else{
            $this->documentosProcedimiento = Documentacion::where('documento_referenciado_id', $this->doc->documento_referenciado_id)->whereNot('tipo', "Procedimiento")->get();
        }
    }
    public function render()
    {
        return view('livewire.documentacion.ver');
    }
}
