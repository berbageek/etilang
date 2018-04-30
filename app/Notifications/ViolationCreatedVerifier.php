<?php

namespace App\Notifications;

use App\Violation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ViolationCreatedVerifier extends Notification
{
    use Queueable;
    /**
     * @var Violation
     */
    private $violation;

    /**
     * Create a new notification instance.
     *
     * @param Violation $violation
     */
    public function __construct(Violation $violation)
    {
        $this->violation = $violation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Pelanggaran butuh Verifikasi.')
                    ->line('Ada data pelanggaran baru membutuhkan verifikasi Anda.')
                    ->line('Nama Pelanggar: ' . $this->violation->violator_name)
                    ->line('Terimakasih banyak sudah menggunakan aplikasi E-Tilang.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
