<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Tabla extends Component
{

    public $codigo;
    public $nombre;
    public $apellido;

    #[On('tablaUsuarios')]
    public function render()
    {
        $query = User::
            orderBy('id', 'desc');

        // Filtros
        if ($this->codigo) {
            $query->where('codigo', 'like', '%' . $this->codigo . '%');
        }
        
        if ($this->nombre) {
            $query->where('name', 'like', '%' . $this->nombre . '%');
        }
        
        if ($this->apellido) {
            $query->where('lastname', 'like', '%' . $this->apellido . '%');
        }

        $usuarios = $query->paginate(50);

        return view('livewire.user.tabla', [
            'usuarios' => $usuarios
        ]);
    }

    public function delete($id)
    {
        try {
            // Buscar el usuario
            $usuario = User::findOrFail($id);

            // Eliminar la información extra relacionada, si existe
            if ($usuario->informacionExtra) {
                $usuario->informacionExtra->delete();
            }

            // Eliminar el usuario
            $usuario->delete();

            // Actualizar la tabla de usuarios en la interfaz y mostrar el mensaje de éxito
            $this->dispatch('tablaUsuarios');
            Toaster::success('Usuario eliminado exitosamente!');
        } catch (\Throwable $th) {
            // Mostrar mensaje de error en caso de falla
            Toaster::error('Fallo al momento de eliminar el usuario!');
        }
    }
    public function resetFilters()
    {
        $this->reset(['fecha', 'codigo', 'nombre', 'apellido']);
        $this->resetPage();
    }
}
