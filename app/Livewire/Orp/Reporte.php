<?php

namespace App\Livewire\Orp;

use App\Models\Amasado;
use App\Models\Decorado;
use App\Models\DivisionFormadoDecorado;
use App\Models\Fermentacion;
use App\Models\Horneado;
use App\Models\Orp;
use App\Models\Premezcla1;
use App\Models\Premezcla2;
use App\Models\Premezcla3;
use App\Models\PreparadorMaestro;
use App\Models\Receta;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class Reporte extends Component
{

    public $orpId;
    public $orp;
    public $receta;
    public $preparacion;
    public $saldo_preparacion;
    public $resultados;

    public $amasado;

    public $decoraciones;
    public $recetaDecorado;
    public $division;
    public $fermentacion;
    public $horneado;


    #[On('reporte')]
    public function mount()
    {
        $this->resultados = array_values(array_merge(
            Premezcla1::where('orp_id', $this->orpId)
                ->select(['azucar'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla1::where('orp_id', $this->orpId)
                ->select(['leche'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla1::where('orp_id', $this->orpId)
                ->select(['gluten'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla1::where('orp_id', $this->orpId)
                ->select(['sal_yodada'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla1::where('orp_id', $this->orpId)
                ->select(['propionato_calcio'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla1::where('orp_id', $this->orpId)
                ->select(['esteaoril_lactilato_sodio'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla1::where('orp_id', $this->orpId)
                ->select(['almidon'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla2::where('orp_id', $this->orpId)
                ->select(['lecitina_soya'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla2::where('orp_id', $this->orpId)
                ->select(['extracto_malta'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla3::where('orp_id', $this->orpId)
                ->select(['manteca'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            Premezcla3::where('orp_id', $this->orpId)
                ->select(['emulsificante'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            PreparadorMaestro::where('orp_id', $this->orpId)
                ->select(['harina_trigo'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            PreparadorMaestro::where('orp_id', $this->orpId)
                ->select(['levadura'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
            PreparadorMaestro::where('orp_id', $this->orpId)
                ->select(['agua'])->orderBy('id', 'desc')
                ->first()?->toArray() ?? ['sin datos'],
        ));

        $this->decoraciones = Decorado::where('orp_id', $this->orpId)->first();

        $this->orp = Orp::where('id', $this->orpId)->first();
        $this->receta = Receta::where('producto_id', $this->orp->producto_id)->whereNot('etapa', 'Decorado Pintado')
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
        //amasado
        $this->amasado = Amasado::where('orp_id', $this->orpId)->get();
        //decorado
        $this->recetaDecorado = Receta::where('producto_id', $this->orp->producto_id)->where('etapa', 'Decorado Pintado')
            ->select('etapa', DB::raw('GROUP_CONCAT(id) as recetas_ids')) // Agrupa por etapa
            ->groupBy('etapa')
            ->get()
            ->map(function ($grupo) {
                // Recuperar las recetas individuales para cada etapa
                $grupo->recetas = Receta::whereIn('id', explode(',', $grupo->recetas_ids))->get();
                return $grupo;
            });
        //division
        $this->division = DivisionFormadoDecorado::where('orp_id', $this->orpId)->get();
        //division
        $this->fermentacion = Fermentacion::where('orp_id', $this->orpId)->get();
        //horneado
        $this->horneado = Horneado::where('orp_id', $this->orpId)->get();
    }

    public function render()
    {
        return view('livewire.orp.reporte');
    }
}
