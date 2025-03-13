<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TcnHabilidad extends Model
{
    use HasFactory;

    protected $table = 'tcn_habilidads';

    protected $fillable = [
        'candidato_id',
        'habilidad',
        'nivel',
        'categoria',
        'estado',
    ];

    // Relación con Candidato
    public function candidato()
    {
        return $this->belongsTo(TcnCandidato::class, 'candidato_id');
    }
}
