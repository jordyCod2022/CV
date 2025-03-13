<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TcnReferencia extends Model
{
    use HasFactory;

    protected $table = 'tcn_referencias';

    protected $fillable = [
        'candidato_id',
        'nombre_referencia',
        'telefono_referencia',
        'email_referencia',
        'relacion',
        'estado',
    ];

    // Relación con Candidato
    public function candidato()
    {
        return $this->belongsTo(TcnCandidato::class, 'candidato_id');
    }

}
