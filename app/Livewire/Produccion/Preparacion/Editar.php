<?php

namespace App\Livewire\Produccion\Preparacion;

use App\Models\Premezcla1;
use App\Models\Premezcla2;
use App\Models\Premezcla3;
use App\Models\PreparadorMaestro;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;


class Editar extends ModalComponent
{

    public $etapa;
    public $orp;
    public $preparacion;

    /*inputs */
    public $trabajador_id;
    public $codigo;
    public $nombre;
    /*premezcla1 */
    public $azucar;
    public $leche;
    public $gluten;
    public $sal_yodada;
    public $propionato_calcio;
    public $esteaoril_lactilato_sodio;
    public $almidon;

    /*premezcla2 */
    public $lecitina_soya;
    public $extracto_malta;

    /*premezcla3 */
    public $manteca;
    public $emulsificante;

    /*preparador maestro */
    public $harina_trigo;
    public $levadura;
    public $agua;

    protected $rules = [];

    public function mount($etapa = null, $orp)
    {
        $this->etapa = $etapa;
        $this->orp = $orp;

        if ($this->etapa == 'Pre mezcla 1') {
            $this->preparacion = Premezcla1::where('orp_id', $this->orp)->first();
            $this->azucar = $this->preparacion->azucar / 1;
            $this->leche = $this->preparacion->leche / 1;
            $this->gluten = $this->preparacion->gluten / 1;
            $this->sal_yodada = $this->preparacion->sal_yodada / 1;
            $this->propionato_calcio = $this->preparacion->propionato_calcio / 1;
            $this->esteaoril_lactilato_sodio = $this->preparacion->esteaoril_lactilato_sodio / 1;
            $this->almidon = $this->preparacion->almidon / 1;
        }

        if ($this->etapa == 'Pre mezcla 2') {
            $this->preparacion = Premezcla2::where('orp_id', $this->orp)->first();
            $this->lecitina_soya = $this->preparacion->lecitina_soya / 1;
            $this->extracto_malta = $this->preparacion->extracto_malta / 1;
        }

        if ($this->etapa == 'Pre mezcla 3') {
            $this->preparacion = Premezcla3::where('orp_id', $this->orp)->first();
            $this->manteca = $this->preparacion->manteca / 1;
            $this->emulsificante = $this->preparacion->emulsificante / 1;
        }

        if ($this->etapa == 'Preparado Mestro') {
            $this->preparacion = PreparadorMaestro::where('orp_id', $this->orp)->first();
            $this->harina_trigo = $this->preparacion->harina_trigo / 1;
            $this->levadura = $this->preparacion->levadura / 1;
            $this->agua = $this->preparacion->agua / 1;
        }
    }

    public function render()
    {
        return view('livewire.produccion.preparacion.editar');
    }
    public function submit()
    {
        try {
            if ($this->etapa == 'Pre mezcla 1') {
                $this->preparacion->update([
                    'responsable' => $this->trabajador_id,
                    'azucar' => $this->azucar,
                    'leche' => $this->leche,
                    'gluten' => $this->gluten,
                    'sal_yodada' => $this->sal_yodada,
                    'propionato_calcio' => $this->propionato_calcio,
                    'esteaoril_lactilato_sodio' => $this->esteaoril_lactilato_sodio,
                    'almidon' => $this->almidon,
                ]);
            }

            if ($this->etapa == 'Pre mezcla 2') {
                $this->preparacion->update([
                    'responsable' => $this->trabajador_id,
                    'lecitina_soya' => $this->lecitina_soya,
                    'extracto_malta' => $this->extracto_malta,
                ]);
            }

            if ($this->etapa == 'Pre mezcla 3') {
                $this->preparacion->update([
                    'responsable' => $this->trabajador_id,
                    'manteca' => $this->manteca,
                    'emulsificante' => $this->emulsificante,
                ]);
            }

            if ($this->etapa == 'Preparado Mestro') {
                $this->preparacion->update([
                    'responsable' => $this->trabajador_id,
                    'harina_trigo' => $this->harina_trigo,
                    'levadura' => $this->levadura,
                    'agua' => $this->agua,
                ]);
            }

            $this->dispatch('reporte');
            $this->closeModal();
            Toaster::success('Registro actualizado exitosamente!');
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de actualizar: ' . $th->getMessage());
        }
    }
}
