<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{

    // Constructor del controlador

    public function index()
    {
        if (Auth::check()) {
            // Redirige al usuario a la página principal o al dashboard si ya está autenticado
            return redirect()->intended('/');
        }


        return view('auth.login');
    }
    public function store(Request $request)
    {


        $credentials = $request->only('codigo', 'password');
        $verificador = User::where('codigo', $credentials['codigo'])->first();
        if ($verificador->rol == 'Inhabilitado') {
            return back()->withErrors([
                'codigo' => 'El usuario está inhabilitado.',
            ]);
        } else {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                if($verificador->rol == 'Mantenimiento'){return redirect()->route('OrdenTrabajo.index', 'maquinaria');}
                else{

                    return redirect()->route('higienePersonal.index');
                }
            }
        }


        return back()->withErrors([
            'codigo' => 'Las credenciales no son correctas.',
        ]);
    }
    public function cerrar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
