<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class msgModerator extends Notification
{
    use Queueable;

    private $teacherId;

    /**
     * Create a new notification instance.
     *
     * @param $teacherId
     */
    public function __construct($teacherId)
    {
        //
        $this->teacherId = $teacherId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/admincp/teachers/pending');
        return (new MailMessage)
            ->subject('مُعلم جديد')
            ->line('مرحبا، لقد قام معلم جديد بتقديم استمارة إلى الموقع')
            ->line('يمكنك مراجعة الملف والموافقة من خلال الرابط التالي')
            ->action('لوحة التحكم', $url);
           // ->action('لوحة التحكم', $url);

    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
