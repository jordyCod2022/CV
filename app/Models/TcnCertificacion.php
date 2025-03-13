<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TcnCertificacion extends Model
{
    use HasFactory;

    protected $table = 'tcn_certificacions';

    protected $fillable = [
        'candidato_id',
        'nombre_certificacion',
        'institucion_emisora',
        'tipo_certificacion',
        'fecha_emision',
        'fecha_expiracion',
        'estado',
    ];

    // Relación con Candidato
    public function candidato()
    {
        return $this->belongsTo(TcnCandidato::class, 'candidato_id');
    }
}
