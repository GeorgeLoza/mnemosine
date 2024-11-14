<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class Editar extends ModalComponent
{
    public $id;

    /* Inputs */
    public $name;
    public $lastname;
    public $rol;
    public $turno;
    public $codigo;
    public $password;
    public $showPassword = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'rol' => 'required',
        'turno' => 'required'
    ];
    public function mount()
    {

        // Cargar el usuario y su información adicional
        $usuario = User::findOrFail($this->id);

        $this->name = $usuario->name;
        $this->lastname = $usuario->lastname;
        $this->rol = $usuario->rol;
        $this->turno = $usuario->turno;
        $this->codigo = $usuario->codigo;

    }



    public function render()
    {
        return view('livewire.user.editar');
    }

    public function save()
    {
        $this->validate();

        try {
            $usuario = User::findOrFail($this->id);
            $usuario->name = $this->name;
            $usuario->lastname = $this->lastname;
            $usuario->rol = $this->rol;
            $usuario->turno = $this->turno;
            $usuario->codigo = $this->codigo;

            // Si el campo de la contraseña no está vacío, actualizarla
            if (!empty($this->password)) {
                $usuario->password = Hash::make($this->password);
            }

            $usuario->save();


            $this->closeModal();
            $this->dispatch('tablaUsuarios');
            Toaster::success('Usuario actualizado exitosamente!');
        } catch (\Throwable $th) {
            Toaster::error('Fallo al momento de actualizar el usuario: ' . $th->getMessage());
        }
    }
    public function cerrar()
    {
        $this->closeModal();
    }


}
