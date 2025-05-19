<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Economico extends Model
{
    use HasFactory;

    protected $table = 'economicos';
    protected $primaryKey = 'id';
    protected $perPage = 20;

    protected $fillable = 
    [
        'yearr',
        'mes',
        'numcitas',
        'ingresos'
    ];

    public $timestamps = true;
}
