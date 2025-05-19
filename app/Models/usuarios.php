<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'idusuario';
    protected $perPage = 8;

    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'id_genero', 
        'direccion',
        'latitud',
        'longitud',
        'telefono',
        'correo',
        'contrasena',
        'id_rol',
        'id_estado', 
    ];

    public $timestamps = true;

    // Cambié $hiden a $hidden
    protected $hidden = [
        'contrasena',
    ];

   
    protected $casts = [
        'contrasena' => 'hashed',
    ];

    // Relaciones de claves foráneas
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero'); 
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado'); 
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol'); 
    }
}
