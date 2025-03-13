<?php

namespace App\Models;

use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TcnCandidato extends Model implements MustVerifyEmail
{
    use HasFactory, Notifiable; // Asegúrate de usar el trait Notifiable

    protected $table = 'tcn_candidatos';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'ciudad',
        'pais',
        'fecha_nacimiento',
        'genero',
        'estado_civil',
        'nacionalidad',
        'linkedin',
        'foto',
        'curriculum',
        'estado',
        'email_verified_at',
        'verification_token',
    ];
    

    protected $hidden = [
        'verification_token', // Ocultar el token en las respuestas JSON
    ];

    // Métodos requeridos por MustVerifyEmail
    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }

    public function markEmailAsVerified()
    {
        $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification);
    }
    public function getEmailForVerification()
    {
        return $this->email;
    }

    // Relaciones
    public function educacion()
    {
        return $this->hasMany(TcnEducacion::class, 'candidato_id');
    }

    public function experienciaLaboral()
    {
        return $this->hasMany(TcnExperienciaLaboral::class, 'candidato_id');
    }

    public function habilidades()
    {
        return $this->hasMany(TcnHabilidad::class, 'candidato_id');
    }

    public function idiomas()
    {
        return $this->hasMany(TcnIdioma::class, 'candidato_id');
    }

    public function certificaciones()
    {
        return $this->hasMany(TcnCertificacion::class, 'candidato_id');
    }

    public function referencias()
    {
        return $this->hasMany(TcnReferencia::class, 'candidato_id');
    }
}