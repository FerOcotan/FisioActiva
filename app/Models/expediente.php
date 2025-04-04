<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expediente extends Model
{
    use HasFactory;

    protected $table = 'expedientes';
    protected $primaryKey = 'numeroexpediente';
    protected $perPage = 20;
    public $timestamps = false;

    protected $fillable = [
        'idusuario',
        'fechacreacion',
        'numcitas',
        'diagnostico',
        'fechaevaluacion',
        'historiaclinica',
        'observacion',
        'palpacion',
        'sensibilidad',
        'arcosdemovimiento',
        'fuerzamuscular',
        'perimetria',
        'longitudmiembrosinf',
        'marcha',
        'postura',  
        'nombrefisioterapeuta',
        'notasevolutivas',
        'estado',
    ];

    public function usuario()
    {
        return $this->belongsTo(usuarios::class, 'idusuario', 'idusuario');
    }
}
