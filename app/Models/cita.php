<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class cita extends Model
{
    use HasFactory;

    protected $table = 'citas';
    protected $primaryKey = 'numerocita';
    public $timestamps = true;
    protected $perPage = 20;

    protected $fillable =
    [
        'numeroexpediente',
        'fechahora',
        'id_modalidad', // Asegúrate de que está aquí
        'id_estado',
        'modalidad',
        'cargo',
        'estado',
    ];

    public function expediente()
    {
        return $this->belongsTo(expediente::class, 'numeroexpediente', 'numeroexpediente');
    }

     public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario'); // Asegúrate que 'id_usuario' sea la columna correcta
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }
    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class, 'id_modalidad');
    }
}
