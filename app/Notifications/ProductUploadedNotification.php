<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProductUploadedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $product;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product)
    {

        $this->product = $product;
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
        return (new MailMessage)
            ->line(env('APP_NAME') . ' Platform.')
            ->line('Product uploaded successful')
            ->action('view that product', url('/'))
            ->line('Thank you for using' . env('APP_NAME') . '!');
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
