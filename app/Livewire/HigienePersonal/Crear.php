<?php

namespace App\Livewire\HigienePersonal;

use App\Models\HigienePersonal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Crear extends Component
{
    /*inputs */
    public $trabajador_id;
    public $codigo;
    public $nombre;
    public $uniforme = true;
    public $higiene = true;
    public $salud = true;
    public $objetos = true;
    public $observaciones;
    public $correccion;
    public $extra = false;

    protected $rules = [
        'trabajador_id' => 'required|exists:users,id',
        'observaciones' => 'nullable|required_if:extra,true',
        'correccion' => 'nullable|required_if:extra,true',
    ];

    public function updatedCodigo()
    {
        // Buscar el usuario por el código
        $user = User::where('codigo', $this->codigo)->first();

        // Si se encuentra el usuario, establecer el nombre; si no, dejar el campo vacío
        $this->nombre = $user ? $user->name . " " . $user->lastname : null;
        $this->trabajador_id = $user ? $user->id : null;
    }

    public function updated($propertyName)
    {
        // Verifica si alguno de los checkboxes es falso y activa $extra si es así
        if (in_array($propertyName, ['uniforme', 'higiene', 'salud', 'objetos'])) {
            $this->extra = !$this->uniforme || !$this->higiene || !$this->salud || !$this->objetos;
        }
    }
    public function render()
    {
        return view('livewire.higiene-personal.crear');
    }
    public function submit()
    {
        $this->validate();
        try {
            HigienePersonal::create([
                'supervisor_id' => auth()->user()->id,
                'trabajador_id' => $this->trabajador_id,
                'tiempo' => Carbon::now(),
                'uniforme' => $this->uniforme,
                'higiene' => $this->higiene,
                'salud' => $this->salud,
                'objetos_extranos' => $this->objetos,
                'observaciones' => $this->observaciones,
                'correccion' => $this->correccion,
            ]);

            Toaster::success('Registro guardado exitosamente!');

            // Reset fields after submission
            $this->reset([
                'codigo',
                'nombre',
                'trabajador_id',
                'uniforme',
                'higiene',
                'salud',
                'objetos',
                'observaciones',
                'correccion',
                'extra'
            ]);
        } catch (\Throwable $th) {
            dd($th);
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
