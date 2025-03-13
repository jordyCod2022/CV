<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TcnIdioma extends Model
{
    use HasFactory;

    protected $table = 'tcn_idiomas';

    protected $fillable = [
        'candidato_id',
        'idioma',
        'nivel',
        'estado',
    ];

    // Relación con Candidato
    public function candidato()
    {
        return $this->belongsTo(TcnCandidato::class, 'candidato_id');
    }
}
