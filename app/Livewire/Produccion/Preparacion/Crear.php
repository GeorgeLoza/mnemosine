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

class Crear extends ModalComponent
{
    public $etapa;
    public $orp;

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


    public function updatedCodigo()
    {
        // Buscar el usuario por el código
        $user = User::where('codigo', $this->codigo)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre = $user ? $user->name . " " . $user->lastname : null;
        $this->trabajador_id = $user ? $user->id : null;
    }

    public function mount($etapa = null, $orp)
    {
        $this->etapa = $etapa;
        $this->orp = $orp;
    }

    public function render()
    {
        return view('livewire.produccion.preparacion.crear');
    }
    public function submit()
    {
        if ($this->etapa == 'Pre mezcla 1') {
            // $this->validate();
            try {
                Premezcla1::create([
                    'orp_id' => $this->orp,
                    'tiempo' => Carbon::now(),
                    'user_id' => auth()->user()->id,
                    'responsable' => $this->trabajador_id,
                    'azucar' => $this->azucar,
                    'leche' => $this->leche,
                    'gluten' => $this->gluten,
                    'sal_yodada' => $this->sal_yodada,
                    'propionato_calcio' => $this->propionato_calcio,
                    'esteaoril_lactilato_sodio' => $this->esteaoril_lactilato_sodio,
                    'almidon' => $this->almidon,

                ]);
                $this->dispatch('reporte');
                $this->closeModal();
                Toaster::success('Registro guardado exitosamente!');

                // Reset fields after submission
                $this->reset([
                    'azucar',
                    'leche',
                    'gluten',
                    'sal_yodada',
                    'propionato_calcio',
                    'esteaoril_lactilato_sodio',
                    'almidon'
                ]);
            } catch (\Throwable $th) {

                Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
            }
        }

        if ($this->etapa == 'Pre mezcla 2') {
            // $this->validate();
            try {
                Premezcla2::create([
                    'orp_id' => $this->orp,
                    'tiempo' => Carbon::now(),
                    'user_id' => auth()->user()->id,
                    'responsable' => $this->trabajador_id,
                    'lecitina_soya' => $this->lecitina_soya,
                    'extracto_malta' => $this->extracto_malta,
                ]);
                $this->dispatch('reporte');
                $this->closeModal();
                Toaster::success('Registro guardado exitosamente!');

                // Reset fields after submission
                $this->reset([
                    'lecitina_soya',
                    'extracto_malta',
                ]);
            } catch (\Throwable $th) {
                Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
            }
        }
        if ($this->etapa == 'Pre mezcla 3') {
            // $this->validate();
            try {
                Premezcla3::create([
                    'orp_id' => $this->orp,
                    'tiempo' => Carbon::now(),
                    'user_id' => auth()->user()->id,
                    'responsable' => $this->trabajador_id,
                    'manteca' => $this->manteca,
                    'emulsificante' => $this->emulsificante,
                ]);
                $this->dispatch('reporte');
                $this->closeModal();
                Toaster::success('Registro guardado exitosamente!');

                // Reset fields after submission
                $this->reset([
                    'manteca',
                    'emulsificante',
                ]);
            } catch (\Throwable $th) {

                Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
            }
        }
        if ($this->etapa == 'Preparado Mestro') {
            // $this->validate();
            try {
                PreparadorMaestro::create([
                    'orp_id' => $this->orp,
                    'tiempo' => Carbon::now(),
                    'user_id' => auth()->user()->id,
                    'responsable' => $this->trabajador_id,
                    'harina_trigo' => $this->harina_trigo,
                    'levadura' => $this->levadura,
                    'agua' => $this->agua,
                ]);

                Toaster::success('Registro guardado exitosamente!');

                // Reset fields after submission
                $this->reset([
                    'harina_trigo',
                    'levadura',
                    'agua',
                ]);
                $this->dispatch('reporte');
                $this->closeModal();
                $this->dispatch('success', mensaje: 'ORP registrado exitosamente');
            } catch (\Throwable $th) {
                Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
            }
        }
    }
}
