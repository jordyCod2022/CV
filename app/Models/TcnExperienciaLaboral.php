<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TcnExperienciaLaboral extends Model
{
    use HasFactory;

    protected $table = 'tcn_experiencia_laborals';

    protected $fillable = [
        'candidato_id',
        'empresa',
        'puesto',
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
