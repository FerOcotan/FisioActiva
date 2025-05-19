<?php

namespace App\Models;

use App\Models\Estado;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Expediente extends Model
{
    use HasFactory;

    protected $table = 'expedientes';
    protected $primaryKey = 'numeroexpediente';
    protected $perPage = 8;
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
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
        'id_estado', // Cambio 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }
    public function citas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Cita::class, 'numeroexpediente');
    }
    
    
}
