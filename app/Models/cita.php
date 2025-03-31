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
    return $this->belongsTo(usuarios::class, 'idusuario'); 
}

}
