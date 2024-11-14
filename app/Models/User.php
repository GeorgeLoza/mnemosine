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
