<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $perPage = 20;


    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'genero',
        'direccion',
        'latitud',
        'longitud',
        'telefono',
        'correo',
        'contrasena',
        'rol',
        'estado',
    ];

    public $timestamps = true;
    protected $hiden = [
        'contrasena',
    ];

    protected $casts = [
        'contrsena' => 'hashed',
    ];
}
