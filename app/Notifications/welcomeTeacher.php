<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class welcomeTeacher extends Notification
{
    use Queueable;



    /**
     * Create a new notification instance.
     *
     *
     */
    public function __construct()
    {

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
                    ->subject('تهانينا - رسالة من أكاديمية رؤية')
                    ->line('مرحبا، لقد تمت الموافقة على العضوية الخاصة بكم في الأكاديمية')
                    ->line('الآن ستظهر ضمن نتائج البحث في الموقع')
                    ->action('الدخول إلى الموقع', url('/'));
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
