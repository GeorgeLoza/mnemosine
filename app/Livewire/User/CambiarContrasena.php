<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class CambiarContrasena extends ModalComponent
{
    public $current_password;
    public $new_password;
    public $confirm_password;

    protected $rules = [
        'current_password' => 'required',
        'new_password' => 'required|min:4|different:current_password',
        'confirm_password' => 'required|same:new_password',
    ];

    public function render()
    {
        
        return view('livewire.user.cambiar-contrasena');
    }

    public function updatePassword()
    {
        $this->validate();

        if (!Hash::check($this->current_password, Auth::user()->password)) {
            Toaster::error('La contraseña actual es incorrecta.');
            return;
        }

        try {
            Auth::user()->update([
                'password' => Hash::make($this->new_password),
            ]);

            Toaster::success('Contraseña actualizada correctamente.');
            $this->reset();
        } catch (\Throwable $th) {
            Toaster::error('Error al actualizar la contraseña: ' . $th->getMessage());
        }
    }
    
}
