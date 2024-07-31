<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;
    public $id_vacante;
    public $nombre_vacante;
    public $usuario_id;

    // Constructor donde toma los atriubros que le pasamos a instanciarla
    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {

        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        //creamos una url donde ver las notificacione y se la psamos en el action

        $url = url('/notificaciones/' . $this->id_vacante);

        return (new MailMessage)
            ->line('Has recibido un nuevo candidato en tu vacante')
            ->line('La vacante es: ' . $this->nombre_vacante)
            ->action('Ver Notificaciones', $url)     // texto que va a estar en el boton que nos lleva a la url que tenemo que crear
            ->line('Gracias por usar DevJobs');
    }


    // Retornamos un objeto que se almacena en la bd
    public function toDatabase($notifiable)
    {
        return [
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'usuario_id' => $this->usuario_id,
        ];
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
