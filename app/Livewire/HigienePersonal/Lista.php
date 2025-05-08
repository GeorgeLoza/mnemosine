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
    public $usuariosT4;
    public $usuariosT5;
    public $usuariosT6;
    public $extra = false;
    public $uniforme;
    public $higiene;
    public $salud;
    public $objetos;

    #[On('actualizar_tabla_lista-higiene-personal')]
    public function mount()
    {
        // Obtener la fecha actual (sin hora)
        $fechaHoy = Carbon::today();

        $this->usuariosC = User::where('turno', 'Administración')
            ->whereNot('rol', 'Inhabilitado')
            ->whereNot('rol', 'Admi')
            ->whereNot('rol', 'Visor')
            ->whereNot('rol', 'Administracion')
            ->whereDoesntHave('trabajos', function ($query) use ($fechaHoy) {
                $query->whereDate('created_at', $fechaHoy); // Comparar solo la fecha
            })
            ->orderBy('lastname', 'asc')
            ->get();

        // Repetir la misma lógica para los demás turnos
        $this->usuariosT1 = User::where('turno', 'Embolsado')
            ->whereNot('rol', 'Inhabilitado')
            ->whereNot('rol', 'Admi')
            ->whereNot('rol', 'Visor')
            ->whereNot('rol', 'Administracion')
            ->whereDoesntHave('trabajos', function ($query) use ($fechaHoy) {
                $query->whereDate('created_at', $fechaHoy);
            })
            ->orderBy('lastname', 'asc')
            ->get();

        $this->usuariosT2 = User::where('turno', 'Hornos')
            ->whereNot('rol', 'Inhabilitado')
            ->whereNot('rol', 'Admi')
            ->whereNot('rol', 'Visor')
            ->whereNot('rol', 'Administracion')
            ->whereDoesntHave('trabajos', function ($query) use ($fechaHoy) {
                $query->whereDate('created_at', $fechaHoy);
            })
            ->orderBy('lastname', 'asc')
            ->get();

        $this->usuariosT3 = User::where('turno', 'Producción')
            ->whereNot('rol', 'Inhabilitado')
            ->whereNot('rol', 'Admi')
            ->whereNot('rol', 'Visor')
            ->whereNot('rol', 'Administracion')
            ->whereDoesntHave('trabajos', function ($query) use ($fechaHoy) {
                $query->whereDate('created_at', $fechaHoy);
            })
            ->orderBy('lastname', 'asc')
            ->get();
        $this->usuariosT4 = User::where('turno', 'Burguer King')
            ->whereNot('rol', 'Inhabilitado')
            ->whereNot('rol', 'Admi')
            ->whereNot('rol', 'Visor')
            ->whereNot('rol', 'Administracion')
            ->whereDoesntHave('trabajos', function ($query) use ($fechaHoy) {
                $query->whereDate('created_at', $fechaHoy);
            })
            ->orderBy('lastname', 'asc')
            ->get();
        $this->usuariosT5 = User::where('turno', 'Repostería Fina')
            ->whereNot('rol', 'Inhabilitado')
            ->whereNot('rol', 'Admi')
            ->whereNot('rol', 'Visor')
            ->whereNot('rol', 'Administracion')
            ->whereDoesntHave('trabajos', function ($query) use ($fechaHoy) {
                $query->whereDate('created_at', $fechaHoy);
            })
            ->orderBy('lastname', 'asc')
            ->get();
        $this->usuariosT6 = User::where('turno', 'Almacenes')
            ->whereNot('rol', 'Inhabilitado')
            ->whereNot('rol', 'Admi')
            ->whereNot('rol', 'Visor')
            ->whereNot('rol', 'Administracion')
            ->whereDoesntHave('trabajos', function ($query) use ($fechaHoy) {
                $query->whereDate('created_at', $fechaHoy);
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
