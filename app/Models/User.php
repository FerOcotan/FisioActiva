<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',          // Primer nombre
        'apellido',      // Apellido
        'email',         // Correo electrónico
        'password',      // Contraseña
        'edad',          // Edad
        'direccion',     // Dirección
        'latitud',       // Latitud
        'longitud',      // Longitud
        'telefono',      // Teléfono
        'id_genero',     // ID de género
        'id_rol',        // ID del rol
        'id_estado',     // ID del estado
    ];
   

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }

  public function expediente()
{
    return $this->hasOne(expediente::class, 'id_usuario'); // Singular, correcto
}


public function citas(): HasManyThrough
{
    return $this->hasManyThrough(
        Cita::class,          // Modelo final
        Expediente::class,     // Modelo intermedio
        'id_usuario',          // FK en expedientes (modelo intermedio)
        'numeroexpediente',    // FK en citas (modelo final)
        'id',                  // PK en users (modelo local)
        'numeroexpediente'     // PK en expedientes (modelo intermedio)
    );
}
}
