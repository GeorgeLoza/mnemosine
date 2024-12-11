<?php

namespace App\Livewire\Orp;

use App\Models\Orp;
use App\Models\Premezcla1;
use App\Models\Premezcla2;
use App\Models\Premezcla3;
use App\Models\PreparadorMaestro;
use App\Models\Receta;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Reporte extends Component
{

    public $orpId;
    public $orp;
    public $receta;
    public $preparacion;
    public $saldo_preparacion;
    public $premezcla1_resultados;
    public $premezcla2_resultados;
    public $premezcla3_resultados;
    public $preMaestro_resultados;
    public $resultados;



    public function mount()
    {

        $this->resultados = array_values(array_merge(
            Premezcla1::where('orp_id', $this->orpId)
                ->select(['azucar'])
                ->first()?->toArray() ?? ['sin datos'],
                Premezcla1::where('orp_id', $this->orpId)
                ->select(['leche'])
                ->first()?->toArray() ?? ['sin datos'],
                Premezcla1::where('orp_id', $this->orpId)
                ->select(['gluten'])
                ->first()?->toArray() ?? ['sin datos'],
                Premezcla1::where('orp_id', $this->orpId)
                ->select([ 'sal_yodada'])
                ->first()?->toArray() ?? ['sin datos'],
                Premezcla1::where('orp_id', $this->orpId)
                ->select(['propionato_calcio'])
                ->first()?->toArray() ?? ['sin datos'],
                Premezcla1::where('orp_id', $this->orpId)
                ->select([ 'esteaoril_lactilato_sodio'])
                ->first()?->toArray() ?? ['sin datos'],
                Premezcla1::where('orp_id', $this->orpId)
                ->select(['almidon'])
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla2::where('orp_id', $this->orpId)
                ->select(['lecitina_soya'])
                ->first()?->toArray() ?? ['sin datos'],
                Premezcla2::where('orp_id', $this->orpId)
                ->select(['extracto_malta'])
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla3::where('orp_id', $this->orpId)
                ->select(['manteca'])
                ->first()?->toArray() ?? ['sin datos'],
                Premezcla3::where('orp_id', $this->orpId)
                ->select(['emulsificante'])
                ->first()?->toArray() ?? ['sin datos'],
            PreparadorMaestro::where('orp_id', $this->orpId)
                ->select(['harina_trigo'])
                ->first()?->toArray() ?? ['sin datos'],
                PreparadorMaestro::where('orp_id', $this->orpId)
                ->select(['levadura'])
                ->first()?->toArray() ?? ['sin datos'],
                PreparadorMaestro::where('orp_id', $this->orpId)
                ->select([ 'agua'])
                ->first()?->toArray() ?? ['sin datos'],
        ));











        $this->orp = Orp::where('id', $this->orpId)->first();
        $this->receta = Receta::where('producto_id', $this->orp->producto_id)
            ->select('etapa', DB::raw('GROUP_CONCAT(id) as recetas_ids')) // Agrupa por etapa
            ->groupBy('etapa')
            ->get()
            ->map(function ($grupo) {
                // Recuperar las recetas individuales para cada etapa
                $grupo->recetas = Receta::whereIn('id', explode(',', $grupo->recetas_ids))->get();
                return $grupo;
            });
        $this->preparacion = floor($this->orp->lote);
        $this->saldo_preparacion = $this->orp->lote - $this->preparacion;




    }

    public function render()
    {
        return view('livewire.orp.reporte');
    }
}
