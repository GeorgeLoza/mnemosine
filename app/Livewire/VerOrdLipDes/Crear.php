<?php

namespace App\Livewire\VerOrdLipDes;

use Livewire\Component;
use App\Models\Sector;
use App\Models\OrdLimDes;
use App\Models\VerificacionOrdLipDes;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toaster;

class Crear extends Component
{
    public $sectores = [];
    public $estados = []; // Guardará los estados de los checkboxes
    public $acordeonAbierto = [];
    public $diaActual;

    public function mount()
    {
        // Determinar el día actual
        $this->diaActual = str_replace(
            ['á', 'é', 'í', 'ó', 'ú', 'ñ'],
            ['a', 'e', 'i', 'o', 'u', 'n'],
            strtolower(now()->locale('es')->isoFormat('dddd'))
        );

        // Cargar los sectores con sus ordLimDes
        $this->sectores = Sector::with('ordLimDes')->get();

        // Inicializar los estados
        foreach ($this->sectores as $sector) {
            foreach ($sector->ordLimDes as $ordLimDes) {
                // Verificar qué checkboxes corresponden al día actual
                $mostrarLimpieza = $ordLimDes->{$this->diaActual . '_lo'} == 1;
                $mostrarDesinfeccion = $ordLimDes->{$this->diaActual . '_des'} == 1;
                $mostrarProfunda = $this->diaActual === 'viernes' && $ordLimDes->viernes_des_pro == 1;

                // Inicializar los estados con true solo si corresponden al día actual
                $this->estados[$ordLimDes->id] = [
                    'limpieza' => $mostrarLimpieza ? true : false,
                    'desinfeccion' => $mostrarDesinfeccion ? true : false,
                    'profunda' => $mostrarProfunda ? true : false,
                    'observaciones' => null,
                    'correccion' => null,
                ];
            }
        }
    }


    public function render()
    {
        return view('livewire.ver-ord-lip-des.crear');
    }
    public function registrarPorSector($sectorId)
    {
        $sector = Sector::with('ordLimDes')->find($sectorId);

        foreach ($sector->ordLimDes as $ordLimDes) {
            if (isset($this->estados[$ordLimDes->id])) {
                $estado = $this->estados[$ordLimDes->id];

                // Solo registrar checkboxes del día actual
                $limpieza = $this->diaActual . '_lo';
                $desinfeccion = $this->diaActual . '_des';
                $profunda = $this->diaActual === 'viernes' ? 'viernes_des_pro' : null;

                VerificacionOrdLipDes::create([
                    'ord_lim_des_id' => $ordLimDes->id,
                    'limpieza' => $ordLimDes->{$limpieza} ? ($estado['limpieza'] ?? false) : false,
                    'desinfeccion' => $ordLimDes->{$desinfeccion} ? ($estado['desinfeccion'] ?? false) : false,
                    'profunda' => $profunda && $ordLimDes->{$profunda} ? ($estado['profunda'] ?? false) : false,
                    'user_id' => Auth::id(),
                    'tiempo' => now(),
                    'observaciones' => $estado['observaciones'] ?? null,
                    'correccion' => $estado['correccion'] ?? null,
                ]);
            }
        }

        Toaster::success('Registro guardado exitosamente!');
    }

    public function actualizarEstado($id, $campo, $valor, $sectorId)
    {
        // Actualizar el estado del checkbox
        $this->estados[$id][$campo] = $valor;

        // Si se desmarca, habilitar observaciones y correcciones
        if (!$valor) {
            $this->estados[$id]['observaciones'] = ''; // Inicializar campo si es necesario
            $this->estados[$id]['correccion'] = '';    // Inicializar campo si es necesario
        }
         // Abrir el acordeón correspondiente cuando se actualiza el estado
         $this->acordeonAbierto[$sectorId] = true;
    }
}
