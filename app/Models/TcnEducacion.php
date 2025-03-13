<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TcnEducacion extends Model
{
    use HasFactory;

    protected $table = 'tcn_educacion';

    protected $fillable = [
        'candidato_id',
        'institucion',
        'titulo',
        'nivel_educacion',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];

    // Relación con Candidato
    public function candidato()
    {
        return $this->belongsTo(TcnCandidato::class, 'candidato_id');
    }
}
