<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'codigo',
        'email',
        'password',
        'rol',
        'cargo',
        'turno',
    ];

    public function supervisados()
    {
        return $this->hasMany(HigienePersonal::class, 'supervisor_id');
    }

    // Relación para los registros de HigienePersonal donde el usuario es trabajador
    public function trabajos()
    {
        return $this->hasMany(HigienePersonal::class, 'trabajador_id');
    }
    public function lavadoManos()
    {
        return $this->hasMany(LavadoMano::class);
    }
    public function externo()
    {
        return $this->hasMany(PersonalExterno::class);
    }
    public function verOrdLimDes()
    {
        return $this->hasMany(VerificacionOrdLipDes::class);
    }
    public function trabajadorCuracion()
    {
        return $this->hasMany(Curacion::class, 'trabajador');
    }

    public function trabajosComoResponsableInicio()
    {
        return $this->hasMany(Curacion::class, 'responsable_inicio');
    }

    public function trabajosComoResponsableFin()
    {
        return $this->hasMany(Curacion::class, 'responsable_fin');
    }
    public function herramientasIngresadas()
    {
        return $this->hasMany(VerificacionHerramienta::class, 'user_ingreso');
    }

    public function herramientasSalidas()
    {
        return $this->hasMany(VerificacionHerramienta::class, 'user_salida');
    }

    // En App\Models\User
    public function verificacionesOrdenLimpieza()
    {
        return $this->hasMany(VerificacionOrdenLimpieza::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
