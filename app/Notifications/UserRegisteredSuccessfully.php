<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegisteredSuccessfully extends Notification
{
    use Queueable;

    /**
     * @var User
     */
    protected $user;



    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
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
        /** @var User $user */
        $user = $this->user;

        return (new MailMessage)

                    ->from('contact@seonigeria.com')
                    ->subject('Successfully created new auction account')
                    ->greeting(sprintf('Hello %s', $user->name))
                    ->line('You have successfully registered to our auction for Seonigeria.com. Please activate your account.')
                    ->action('Click Here', route('activate.user', $user->activation_code))
                    ->line('Thank you for partaking in our auction!');
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
