<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class lazyMsg extends Notification
{
    use Queueable;

    private $studentName;

    /**
     * Create a new notification instance.
     *
     * @param $studentName
     */
    public function __construct($studentName)
    {
        //
        $this->studentName = $studentName;
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
                    ->subject('تذكير، حسابك غير نشط')
                    ->line(' مرحبا بك   ' . $this->studentName . '، نتمنى أن تكون في أتم صحة وعافية ،،،')
                    ->line('نذكرك بأن حسابك غير نشط منذ عدة أيام')
                    ->action('زيارة الموقع', url('/'))
                    ->line('يسعدنا زيارتك لنا من جديد');
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
