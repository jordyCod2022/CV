<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class VerifyEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', // Nombre de la ruta de verificación
            now()->addMinutes(60), // Tiempo de expiración del enlace
            ['id' => $notifiable->getKey()] // ID del candidato
        );

        return (new MailMessage)
            ->subject('Verifica tu dirección de correo electrónico')
            ->line('Por favor, haz clic en el botón para verificar tu dirección de correo electrónico.')
            ->action('Verificar Correo', $verificationUrl)
            ->line('Si no creaste una cuenta, ignora este mensaje.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
