<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;


class Crear extends ModalComponent
{
    /*inputs */
    public $name;
    public $lastname;
    public $rol;
    public $turno;
    public $codigo;
    public $password;
    public $showPassword = false; // Nueva propiedad

    protected $rules = [
        'name' => 'required|string|max:50',
        'lastname' => 'required|string|max:50',
        'rol' => 'required',
        'turno' => 'required',
        'codigo' => 'required',
        'password' => 'required',
    ];

    public function render()
    {
        return view('livewire.user.crear');
    }

    public function save()
    {

        $this->validate();
        try {
             User::create([
                'name' => $this->name,
                'lastname' => $this->lastname,
                'rol' => $this->rol,
                'turno' => $this->turno,
                'codigo' => $this->codigo,
                'password' => Hash::make($this->password),
            ]);
            $this->closeModal();
            $this->dispatch('tablaUsuarios');
            Toaster::success('Usuario creado exitosamente!');
        } catch (\Throwable $th) {

            Toaster::error('Fallo al momento de crear el usuario: ' . $th->getMessage());
        }
    }
    public function cerrar()
    {
        $this->closeModal();
    }
}
