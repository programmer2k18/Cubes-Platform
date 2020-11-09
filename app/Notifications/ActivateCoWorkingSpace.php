<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ActivateCoWorkingSpace extends Notification implements ShouldQueue
{
    use Queueable;
    protected $coworking;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($co)
    {
        $this->coworking = $co;
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
                    ->subject('Acceptance of your Co-working space: '. $this->coworking->name)
                    ->greeting('Dear '. ucfirst($this->coworking->name) . 'Owner')
                    ->line('Your Co-working space has been activated successfully You can start
                       using our platform now')
                    ->line('Here is your Email: '. $this->coworking->email)
                    ->line('Here is your Password: '. $this->coworking->password.
                       ' , You can change it later.')
                    ->action('Login Now', 'http://127.0.0.1:8000/dashboard/login')
                    ->line('Thank you for using our platform!');
    }
}
