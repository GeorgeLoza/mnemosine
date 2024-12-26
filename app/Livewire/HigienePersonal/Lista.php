<?php

namespace App\Livewire\HigienePersonal;

use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use App\Models\HigienePersonal;
use Carbon\Carbon;
use Livewire\Attributes\On;

class Lista extends Component
{

    public $usuariosC;
    public $usuariosT1;
    public $usuariosT2;
    public $usuariosT3;
    public $extra = false;
    public $uniforme;
    public $higiene;
    public $salud;
    public $objetos;

    #[On('actualizar_tabla_lista-higiene-personal')]
    public function mount()
    {
        $horaLimite = Carbon::now()->subHours(5);

        $this->usuariosC = User::where('turno', 'Central')
            ->whereDoesntHave('trabajos', function ($query) use ($horaLimite) {
                $query->where('created_at', '>=', $horaLimite);
            })
            ->orderBy('lastname', 'asc')
            ->get();

        $this->usuariosT1 = User::where('turno', 'Turno 1')
            ->whereDoesntHave('trabajos', function ($query) use ($horaLimite) {
                $query->where('created_at', '>=', $horaLimite);
            })
            ->orderBy('lastname', 'asc')
            ->get();

        $this->usuariosT2 = User::where('turno', 'Turno 2')
            ->whereDoesntHave('trabajos', function ($query) use ($horaLimite) {
                $query->where('created_at', '>=', $horaLimite);
            })
            ->orderBy('lastname', 'asc')
            ->get();

        $this->usuariosT3 = User::where('turno', 'Turno 3')
            ->whereDoesntHave('trabajos', function ($query) use ($horaLimite) {
                $query->where('created_at', '>=', $horaLimite);
            })
            ->orderBy('lastname', 'asc')
            ->get();





    }

    public function render()
    {

        return view('livewire.higiene-personal.lista');
    }

    public function guardar($id)
    {

        try {
            HigienePersonal::create([
                'supervisor_id' => auth()->user()->id,
                'trabajador_id' => $id,
                'tiempo' => Carbon::now(),
                'uniforme' => 1,
                'higiene' => 1,
                'salud' => 1,
                'objetos_extranos' => 1,
            ]);

            $this->dispatch('actualizar_tabla_lista-higiene-personal');
            Toaster::success('Registro guardado exitosamente!');
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de registrar: ' . $th->getMessage());
        }
    }
}
